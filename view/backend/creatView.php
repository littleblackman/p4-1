<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include 'view/frontend/menu.php'; ?>
<h2>Ajouter un article</h2>
<p>Vous pouvez créer un article en remplissant le formulaire ci-deçus!</p>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> 
  <script>tinymce.init({ selector:'textarea' });</script>
<form method="post" action="index.php?action=listAllPosts">
        <input type="text" placeholder="titre" name="title" />
        <textarea placeholder="contenu" name="content">Contenu</textarea>
        <input type="submit" />
</form>
<?php include ('view/frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/frontend/template.php'; ?>