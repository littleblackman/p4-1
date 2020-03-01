
<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include 'header.php'; ?>
<h2 class="text-center text-black-50">Derniers Chapitres</h2>
<div class="listChapitres">
	
	<?php while ($data = $posts->fetch(PDO::FETCH_ASSOC)) :?>
		
	   <div class="seul">
	   		<img src="public/images/mt.jpg">
	        <h3 class='t3'>
	            <?= htmlspecialchars($data['title']) ?>
	            
	        </h3>
	        <p>
	        	
	           <em><a class="cha1  text-light" href="index.php?action=pagin&amp;id=<?= $data['id'] ?>">Lire</a></em>
	        </p>
	   </div>
	<?php endwhile;?>
	<?php $posts->closeCursor(); ?>
</div>

<?php include 'footer.php'; ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
