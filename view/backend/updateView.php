<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="modify">
	<h3>Modifier l'article <?= $post['title']; ?></h3>
	<form action="index.php?action=update&amp;id=<?= $post['id'] ?>" method="post">
	    <input type="text" name="title" value="<?= $post['title']; ?>"/>
	    <textarea type="text" name="content"><?= $post['content']; ?></textarea>
	    <input type="submit" value="modifier"/>
	</form>
</div>

<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>
