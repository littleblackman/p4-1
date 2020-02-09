<?php
//

ini_set('display_errors','on');
error_reporting(E_ALL);

class Routeur{
	public function route()
	{
		(isset($_GET['action'])) ? $action = $_GET['action'] : $action = "listPosts" ;

		try 
		{
			$front = new Frontend();
			$back = new Backend();
			switch($action) {
				case 'listPosts':
					$front->listPosts();
					break;
				
				case 'connect':
					$back->connect();
					break;
				case 'login':
					if(isset($_POST) AND !empty($_POST))
						{
							if (!empty(htmlspecialchars($_POST['username'])) && !empty(htmlspecialchars($_POST['password'])))
						    {
						    	$back->login($_POST['username'], sha1($_POST['password']));
						    }else
						    {
						    	throw new Exception("remplissez les champs");
						    	
						    }		    
						}
				    else
				    {
                    	echo "Vous n'éte pas autoriser c'est l'espace reservé à l'admin du site";
		            }
					
					break;

				case 'disconnect':
					$back->disconnect();
					break;
				case 'post':
					$front->post();
					break;

				case 'auteur':
					$front->auteur();
					break;

				case 'update':
				    if (isset($_GET['id']) && $_GET['id'] > 0) {
						$back->update($_POST['titre'], $_POST['contenu']);
						
	                }
	                else{
	                	echo"erreur";
	                }
					break;
				case 'delete':
					$back->deletePost();
					break;

				case 'creatPost':
					$back->creatPost();
					break;
				case 'publishPost':
					if (!empty($_POST['title']) && !empty($_POST['content'])) {
					$back->setPost($_POST['title'], $_POST['content']);
					var_dump("l'article as bien été ajouté");
					
				    }else {
				    	var_dump('erreur');
	                    throw new Exception("impossible d'ajouter l'article !");
	                }
		       	    
					break;
				case 'addComment':
		            if (isset($_GET['id']) && $_GET['id'] > 0) {
		                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
		                {
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

	} 
}