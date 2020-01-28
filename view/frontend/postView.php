
<!--affichage d'un billet et ses commentaires--> 
<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>
<?php include 'menu.php' ?>
        <p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news col-sm-9 col-sm-push-3  text-justify monBlock">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>
<?php
while ($comment = $comments->fetch())
{
?>
   <div class='col-md-12 text-justify text-center'>
        <h3 class='t3'>
            <?= htmlspecialchars($comment['author']) ?>
            <em><?= $comment['comment_date_fr'] ?></em>
        </h3>
        <p>
           <?= htmlspecialchars($comment['comment']) ?>
        </p>
   </div>
<?php
}

?>




<form class="text-center" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" class="btn btn-success"/>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include 'footer.php' ?>