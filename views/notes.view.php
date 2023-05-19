
<?php require('partial/header.php') ?>
<?php require('partial/nav.php') ?>
<?php require('partial/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
         <ul>
             <?php foreach ($notes as $note):?>
                 <li>
                     <a href="/note?id=<?=$note['id']?>" class="text-blue-500 hover:underline">
                         <?= htmlspecialchars($note['text'])?>
                     </a>
                 </li>

             <?php endforeach ?>

             <p class="mt-6">
                 <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
             </p>
         </ul>
        </div>
    </main>

<?php require('partial/foot.php') ?>