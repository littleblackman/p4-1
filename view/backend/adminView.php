<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="espace_admin">

    <h2 class="text-success text-left bienvenu">Bienvenue <?= $_SESSION['admin'] ?></h2>
    
    <h1 class="titre_admin">Espace administration</h1>
    <button class="ajoutbutton float-right">
        <a href="index.php?action=creatPost">ajouter un article</a>
    </button>
    <button class="disconnectbutton float-left">
        <a href="index.php?action=disconnect">Déconnecter</a>
    </button>
    <div class="billets text-center">
        <h3 class="text-success text-left t4">Billets du blog </h3>
         
        <?php
        while ($data = $allPosts->fetch())
        {
        ?>
        <div class="text-left news">
            <h3>
                <?php echo htmlspecialchars($data['title']); ?>               
                
            </h3>

            <div class="act">
                <button > 
                    <a href="index.php?action=edit&amp;id=<?= $data['id'] ?>">modifier</a>
            
                </button>
                <button>
                    <a href="index.php?action=delete&amp;id=<?= $data['id'] ?>">supprimer</a>
                </button> 
            </div>
        </div>
        <?php
        } // Fin de la boucle des billets
        $allPosts->closeCursor();
        ?>
        <br/>
    </div>

</div></br>
<div >
    <h3 class="text-success text-left t4">Liste des commentaires</h3>
<?php
while ($comment = $allComments->fetch())
{
?>
   <div class='col-md-12 text-justify'>
        <h3 class=''>
            <?= htmlspecialchars($comment['author']) ?>
            
        </h3>
        <i class="fa fa-trash-o" aria-hidden="true"></i>
        <em><?= $comment['comment_date_fr'] ?>
        </em>
        <p class="">
           <?= htmlspecialchars($comment['comment']) ?>
        </p>
        <hr>
   </div>
<?php
}

?>
</div>
<br/>
<div>
    <h3>Commentaires signalés</h3>
<?php
while ($flag = $flagComment->fetch())
{
?>
   <div class='col-md-12 text-justify comment'>
        <h3 class='t3'>
            <?= htmlspecialchars($flag['author']) ?>
            
        </h3>
        <em><?= $flag['comment_date_fr'] ?>
            </em>
        <p>
           <?= htmlspecialchars($flag['comment']) ?>
        </p>
        <button><a href="index.php?action=deleteComment&amp;id=<?= $flag['id'] ?>">suprimer</a> </button>
        <hr>
   </div>
<?php
}

?>
<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>