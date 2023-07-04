<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes) // should be array only
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($attributes['password'], 1000)) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return empty($this->errors);
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw(){
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed(){
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($filed, $message){
        $this->errors[$filed] = $message;
    }
}