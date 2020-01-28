 <?php
//
ini_set('display_errors','on');
error_reporting(E_ALL);


//le routeur
require('controller/Frontend.php');
require('controller/Backend.php');
//if(isset($_GET['action']) { $action = $_GET['action'];} else { $action = "listPosts";}
(isset($_GET['action'])) ? $action = $_GET['action'] : $action = "listPosts" ;
//    condition         ? si true                   :    si false ;
// ternaire (if en ternaire)
try 
{
	$front = new Frontend();
	$back = new Backend();
	switch($action) {
		case 'listPosts':
			$front->listPosts();
			break;
		case 'listAllPosts':
			$back->listAllPosts();
			break;
		case 'connect':
			$back->connect();
			break;
		case 'post':
			$front->post();
			break;
		case 'delete':
			$back->deletePost();
			break;
		case 'insertPost':
			$back->creatPost();
            if (isset($_GET['titre']) && !isset($_GET['contenu'])) 
			{
				$back->setPost($_POST['titre'], $_POST['contenu']);
				echo "l'article as bien été ajouté";
       	    }
			break;
		case 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $back->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
            break;
		default:
			echo "erreur 404";
	}
}

catch(Exception $e)
{
	echo 'Erreur: ' . $e->getMessage();
}
