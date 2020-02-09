<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include (VIEW.'frontend/menu.php'); ?>
<div class="ajout">
	<h2>Ajouter un article</h2>
	<p>Vous pouvez créer un article en remplissant le formulaire ci-deçus!</p>


	  <script src="https://cdn.tiny.cloud/1/36r7arq0jnxbsnzf2bqw6ybr6c6jj21776jivbuqkdyucps8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	  <script>tinymce.init({ selector:'textarea' });</script>
	<form class="form_creer" action="index.php?action=publishPost" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <label for="content">Contenu</label><br />
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit" class="validation btn btn-success"/>
        </div>
    </form>
</div>

<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>