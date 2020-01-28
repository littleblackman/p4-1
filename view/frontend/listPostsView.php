<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include 'menu.php'; ?>
<p class="text-center text-success t4">Dérniers billets du blog </p>
<?php
while ($data = $posts->fetch(PDO::FETCH_ASSOC))
{
?>
   <div class='col-md-12 text-justify text-center'>
        <h3 class='t3'>
            <?= htmlspecialchars($data['title']) ?>
            <em><?= $data['creation_date_fr'] ?></em>
        </h3>
        <p>
           <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire l'article</a></em>
        </p>
   </div>
<?php
}
$posts->closeCursor();
?>
<?php include 'footer.php'; ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>