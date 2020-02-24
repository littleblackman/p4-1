<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="modify">
	<button class="retour"><a href="index.php?action=adminIndex">page admin</a></button>
	<h3>Modifier le <?= $post['title']; ?></h3>
	<form action="index.php?action=update&amp;id=<?= $post['id'] ?>" method="post">
	    <input type="text" name="title" value="<?= $post['title']; ?>"/>
	    <textarea type="text" name="content"><?= $post['content']; ?></textarea>
	    <input type="submit" value="modifier"/>
	</form>
</div>

<script src="https://cdn.tiny.cloud/1/36r7arq0jnxbsnzf2bqw6ybr6c6jj21776jivbuqkdyucps8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>
