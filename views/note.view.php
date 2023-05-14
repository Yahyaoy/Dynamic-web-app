
<?php require('partial/header.php') ?>
<?php require('partial/nav.php') ?>
<?php require('partial/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a class="text-blue-500 underline" href="/notes">go back</a>
            </p>
              <p><?= $note['text']?></p>

        </div>
    </main>

<?php require('partial/foot.php') ?>