<?php

/**
 * Class Database - A class to establish database connection and execute SQL queries
 */
class Database
{
    public $connection;
    public $statement;
    /**
     * Database constructor.
     * @param array $config - configuration details for the database
     * @param string $username - username to connect to the database
     * @param string $password - password to connect to the database
     */
    public function __construct($config, $username = 'root', $password = '')
    {
        // Build DSN string using the configuration array and assign it to $dsn variable
        $dsn = 'mysql:' . http_build_query($config, '', ';');
//        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};";

        // Establish a new PDO connection using the $dsn, $username and $password and set the default fetch mode to fetch associative arrays
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * A method to execute SQL queries with parameters and return the result
     * @param string $query - SQL query string
     * @param array $params - An associative array of parameters to bind to the query
     * @return bool|PDOStatement - Return the PDOStatement object on success or false on failure
     */
    public function query($query, $params = [])
    {
        // Prepare the SQL query statement
        $this->statement = $this->connection->prepare($query);
        // Bind the parameters to the prepared statement and execute the query
        $this->statement->execute($params);
        // Return the statement object on success or false on failure
//        return $statement;
        return $this;
    }
    public function get(){
        return $this->statement->fetchAll();
    }
    public function find(){
        return $this->statement->fetch();
    }

    public function findOrFail(){
        $result = $this->find();
        if(!$result){
            abort();
        }
        return $result;
    }
}