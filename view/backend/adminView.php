<?php ob_start(); ?>
<?php include(VIEW.'frontend/menu.php'); ?>
<div class="espace_admin">

    <h2 class="text-success text-left bienvenu">Bienvenue <?= $_SESSION['admin'] ?></h2>
    
    <h1 class="titre_admin">Espace administration</h1>
    <button class="ajoutbutton float-right">
        <a href="index.php?action=creatPost ">ajouter un article</a>
    </button>
    <button class="disconnectbutton float-left">
        <a href="index.php?action=disconnect ">Déconnecter</a>
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
                    <a href="index.php?action=update&amp;id=<?= $data['id'] ?>">modifier</a>
            
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

</div>
<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require (VIEW.'frontend/template.php'); ?>