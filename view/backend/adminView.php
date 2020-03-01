<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="espace_admin">

    <h2 class="text-dark text-left bienvenu">Bienvenue <?= $_SESSION['admin'] ?></h2>
    
    <h1 class="titre_admin text-dark">Espace administration</h1>
    <button class="ajoutbutton float-right">
        <a href="index.php?action=creatPost">ajouter un article</a>
    </button>
    <button class="disconnectbutton float-left">
        <a href="index.php?action=disconnect">Déconnecter</a>
    </button>
    <div class="billets text-center">
        <h3 class="text-left">Billets du blog </h3> 
            <table class="table">
                <thead>
                    <tr>
                        <th>Chapitres</th>
                        <th>Date</th>
                        <th>Modifier</th>
                        <th>Supprimer</th> 
                    </tr>
                </thead> <tbody>
                <?php
                while ($data = $allPosts->fetch())
                {
                ?>
                    <tr>
                        <td>
                          <?php echo htmlspecialchars($data['title']); ?>
                        </td>
                        <td>  
                           Crée le: <?php echo htmlspecialchars($data['date_creation_fr']); ?><br/> 
                           modifié le: <?php echo htmlspecialchars($data['date_modif_fr']); ?> 
                        </td>
                                       
                        <td>
                            <button>
                                <a href="index.php?action=edit&id=<?= $data['id'] ?>">modifier</a>
                            </button>
                        </td>
                        <td> 
                           <button>
                                <a href="index.php?action=delete&id=<?= $data['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </button>  
                        </td>
                    </tr>
  
                </tbody>
            <?php
            } // Fin de la boucle des billets
            $allPosts->closeCursor();
            ?>
        </table>
            <br/>
    </div>

</div></br>

<br/>
<div class="commentflag">
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
               <button><a href="index.php?action=deleteComment&id=<?= $flag['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> </button>
               <button><a href="index.php?action=annulflag&commentId=<?= $flag['id']; ?>"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a> </button>
            </p>
            
            <hr>
       </div>
    <?php
    }

    ?>
</div>
<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>