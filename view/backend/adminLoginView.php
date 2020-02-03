
<?php $title = "Billets simple pour l'alaska"; ?>
<?php ob_start(); ?>
<?php include (VIEW.'frontend/menu.php'); ?>
<div class='admin'>
    <h3>Connection</h3>
    <p>Vous n'êtes pas connecté, veuillez taper le mot de passe</p>
    <form action="index.php?action=login" method="post" class="connectAdmin">
    <input type='text' name='username'/>
    <input type='password' name='password'/>
    <input type="submit"/>
    </form>
</div>
<?php include (VIEW.'frontend/footer.php'); ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/frontend/template.php'; ?>

 

 
