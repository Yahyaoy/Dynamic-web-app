
<?php require base_path('views/partial/header.php') ?>
<?php require base_path('views/partial/nav.php') ?>
<?php require base_path('views/partial/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class="mb-6">
                <a class="text-blue-500 underline" href="/notes">go back</a>
            </p>
              <p><?= htmlspecialchars($note['text'])?></p>

        </div>
    </main>

<?php require base_path('views/partial/foot.php') ?>