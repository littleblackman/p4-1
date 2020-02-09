
<!--affichage d'un billet et ses commentaires--> 
<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>
<?php include 'header.php' ?>
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

<h2 class="text-left titre_comment">Commenter l'article</h2>
<form class="formComment" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" class="btn"></button>
    </div>
</form>
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
            <button class="float-right btn-success signaler">Signaler</button>
        <p class="commentaire">
           <?= htmlspecialchars($comment['comment']) ?>
        </p>
        <hr>
   </div>
<?php
}

?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include 'footer.php' ?>