<?php require('partial/header.php') ?>
<?php require('partial/nav.php') ?>
<?php require('partial/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p>Hello, <?= $_SESSION['name'] ??'Guest' ?></p>
        </div>
    </main>

<?php require('partial/foot.php') ?>