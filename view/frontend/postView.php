
<!--affichage d'un billet et ses commentaires--> 
<?php ob_start(); ?>

<div class="onePost">
<p><a href="index.php">Retour à la liste des billets</a></p>


<?php        
        if ($page > 1):
    ?><a href="index.php?action=pagin&amp;page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
endif;


for ($i = 1; $i <= $nombreDePages; $i++):
    ?><a href="index.php?action=pagin&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
endfor;


if ($page < $nombreDePages):
    ?>— <a href="index.php?action=pagin&amp;page=<?php echo $page + 1; ?>">Page suivante</a><?php
endif;
?>
<?php
        while ($element = $query->fetch())
        {
        ?>
        <div class="text-left news">
            <h3>
                <?php echo htmlspecialchars($element['title']); ?>               
                
            </h3>
            <p>
                <?php echo htmlspecialchars($element['content']); ?>
            </p>
        </div>
        <?php
        } // Fin de la boucle des billets
        $query->closeCursor();
        ?>








<h2 class="text-left titre_comment">Commenter l'article</h2>
<form class="formComment" action="index.php?action=addComment&amp;id=<?= $page ?>" method="post">
    <div class="">
        <label for="author">Votre pseudo</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div class="comment['id']">
        <label for="comment">Votre commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Poster mon commentaire" class="btn"></button>
    </div>
</form>
<h2>Commentaires</h2>
<?php
while ($comment = $comments->fetch())
{
?>
   <div class='col-md-12 text-justify comment'>
        <h3 class='t3'>
            <?= htmlspecialchars($comment['author']) ?>
            
        </h3>
        <em><?= $comment['comment_date_fr'] ?>
            </em>
            <button class="float-right btn-success signaler">
                <a href="index.php?action=flagComment&amp;commentId=<?= $comment['id']; ?>">Signaler</a> </button>
                <p id="alert">Commentaire signalé</p>
        <p class="commentaire">
           <?= htmlspecialchars($comment['comment']) ?>
        </p>
        <hr>
   </div>
<?php
}

?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include 'footer.php' ?>