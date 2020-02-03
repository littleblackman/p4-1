<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<h2>Espace administration</h2>
<h3 class="text-success admin">Bienvenue <?= $_SESSION['admin'] ?></h3>
<button>
    <a href="index.php?action=creatPost ">ajouter un article</a>
</button>
<p class="text-success t4">Billets du blog </p>
 
<?php
while ($data = $allPosts->fetch())
{
?>
<div class="text-left news">
    <h3>
        <?php echo htmlspecialchars($data['title']); ?>
        <em>le <?php echo $data['date_creation_fr']; ?></em>
    </h3>
    <button>
    	<a href="index.php?action=update&amp;id=<?= $data['id'] ?>">modifier</a>
    
    </button>
    <button>
        <a href="index.php?action=delete&amp;id=<?= $data['id'] ?>">supprimer</a>
    </button>
</div>
<?php
} // Fin de la boucle des billets
$allPosts->closeCursor();
?>
<br/>

<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/frontend/template.php'; ?>