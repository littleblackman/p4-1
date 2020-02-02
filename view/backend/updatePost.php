<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include 'view/frontend/menu.php'; ?>
<h3>Modifier l'article "<?= $post->title ?>"</h3>
<form method="post">
    <input type='text' name='title'/>
    <input type='text' name='content'/>
    <input type="submit"/>
</form>
<?php include 'view/frontend/footer.php'; ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/frontend/template.php'; ?>
