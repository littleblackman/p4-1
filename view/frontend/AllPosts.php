
<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include 'menu.php'; ?>
<div class="chapitres bg-secodary">
    <h2 class="text-center text-light t4">Les Chapitres du livre</h2>

    <?php while ($data = $allPosts->fetch(PDO::FETCH_ASSOC)) : 
        $debut = substr($data['content'], 0, 400);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        $content = $debut;
        ?>
        <div class="col-md-12 text-justify text-center chapitre">
            <h3 class='t3'>
                <?= htmlspecialchars($data['title']) ?>
                
            </h3>
            <p>
                <?= $content; ?>
            </p>
            <em>
                <a class="cha1  text-light" href="index.php?action=pagin&amp;id=<?= $data['id'] ?>">Lire la suite</a>
            </em>
        </div>
    <?php endwhile;?>
</div>
<?php include 'footer.php'; ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
    