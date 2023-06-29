<?php require base_path('views/partial/header.php') ?>
<?php require base_path('views/partial/nav.php') ?>
<?php require base_path('views/partial/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form  method="POST" action="/notes" class="space-y-4">
            <div>
                <label for="text" class="block text-lg font-medium text-blue-700">Text</label>
                <div class="mt-1">
                    <textarea name="text" id="text" cols="40" rows="4" class="block  border border-gray-300 rounded-md shadow-sm  focus:border-indigo-500 sm:text-sm" placeholder="Type text here ..." >
                         <?= $_POST['text'] ?? ' '?>
                    </textarea>
                </div>
            </div>
            <?php if(isset($errors['text'])): ?>
            <p><?= $errors['text'] ?></p>
            <?php endif; ?>
            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create Note</button>
        </form>
    </div>
</main>

<?php require base_path('views/partial/foot.php') ?>
