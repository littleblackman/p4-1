
<!--affichage d'un billet et ses commentaires--> 

<?php include 'menu.php'; 
?>
<?php ob_start();?>
 <?php  
//print_r($_SESSION['flash']); die();
    ?>
<div class="onePost">
    <p><a class="text-secondary retour" href="index.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a></p>
    <div>
        <h2>
            <?= htmlspecialchars($post['title']); ?>                
        </h2>
        <div class="news">
            <?php echo $post['content']; ?>
        </div>
    </div>
    
    <div class="paginNum">
           <?php if($_GET['id'] > 1): ?>
            <a href="index.php?action=pagin&id=<?php echo $post['id'] - 1; ?>&direction=prev">
                <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
            </a>
        <?php endif; ?>

        <?php foreach($posts as $key => $p): ?>
            <a href="index.php?action=pagin&id=<?php echo $p['id']; ?>"><?php echo $key+1; ?>
            
        </a>
        <?php endforeach ?>
        <?php if($_GET['id'] < $po): ?>
            <a href="index.php?action=pagin&id=<?php echo $post['id'] + 1; ?>&direction=next">
                <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
            </a> 
        <?php endif; ?>
    </div>
    <div class="commenterArticle">
        <h2 class="text-left titre_comment"><i class="fa fa-commenting" aria-hidden="true"></i>Commenter l'article</h2>
        <form class="formComment" action="index.php?action=addComment&id=<?= $post['id']; ?>" method="post">
            <table>
                <tr class="">
                    <td>
                        <label for="author">Votre pseudo</label><br />
                    </td>
                    <td>
                        <input type="text" id="author" name="author" />
                    </td>    
                </tr>
                <tr class="comment['id']">
                    <td>
                        <label for="comment">Votre commentaire</label><br />
                    </td>
                    <td>
                        <textarea id="comment" name="comment"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">    
                        <input type="submit" value="Poster mon commentaire" class="btn btn-dark active"></input>
                    </td>
                </tr>
            </table>
        </form>
    </div>

     
    <div class="commentdiv">
        <h2><i class="fa fa-comment-o" aria-hidden="true"></i>Commentaires</h2>
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
           <div class='col-md-12 text-justify comment'>
                <h3 class='t3'>
                    <i class="fa fa-user-circle" aria-hidden="true"><br/></i><?= htmlspecialchars($comment['author']) ?>
                    
                </h3>
                <em><?= $comment['comment_date_fr'] ?>
                </em>
               
                <div class="commentaire">
                    <button class="float-right btn-success signaler">                        
                        <a href="index.php?action=flagComment&postId=<?= $post['id'] ?>&commentId=<?= $comment['id']; ?>"><i class="fa fa-flag" aria-hidden="true"></i></a>
                    </button>
                    <?= htmlspecialchars($comment['comment']) ?>
                </div>
                <hr>
           </div>
        <?php
        }
        ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php include 'footer.php' ?>