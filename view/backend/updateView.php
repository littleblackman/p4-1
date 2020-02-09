
<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="modify">
	<h3>Modifier l'article "<?= $post->title ?>"</h3>
	<form method="post">
	    <input type='text' name='titre' value="<?php echo $title; ?>"/>
	    <input type='text' name='contenu' value="<?php echo $content; ?>"/>
	    <input type="submit"/>
	</form>
</div>

<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>
