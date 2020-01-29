<?php

session_start();

if (isset($_POST['password'])) { #si la variable mot de passe existe
    if ($_POST['password'] == 'fr') {
        $_SESSION['connecte'] = true;
    }
    else {
        $_SESSION['connecte'] = false;
        echo "mauvais mot de passe";
    }
}

if (!isset($_SESSION['connecte']) or $_SESSION['connecte'] == false) { # on vérifie que l'utilisateur ne soit pas connecté
?>
    <p>Vous n'êtes pas connecté, veuillez taper le mot de passe</p>
    <form action="index.php?action=listAllPosts" method="post">
    <input type='password' name='password'/>
    <input type="submit"/>
    </form>
<?php
 
}
 
else { # Dans cette partie, on écrit le code que l'utilisateur administrateur verras
    echo "vous êtes connecte";
}