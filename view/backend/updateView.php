<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="modify">
	<h3>Modifier l'article <?= $post['title']; ?></h3>
	<form action="index.php?action=update" method="post">
	    <input type='text' name='title' value="<?php echo $post['title']; ?>"/>
	    <textarea type='text' name='content'><?php echo $post['content']; ?></textarea>
	    <input type="submit"/>
	</form>
</div>

<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>
