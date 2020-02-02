<?php 

require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';


class Frontend{

    public function listPosts() 
    {
        $manager = new PostManager();
        $posts = $manager->getPosts();
        require('view/frontend/listPostsView.php');
    }
   
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $mode = new PostManager();
            $commentManag = new CommentManager();
            $post = $mode->getPost($_GET['id']);
            $comments = $commentManag->getComments($_GET['id']);

            require('view/frontend/postView.php');
        }else{
            echo 'Erreur : aucun identifiant de billet envoyé';
            
       }
    }

    public function auteur()
    {

        require('view/frontend/Auteur.php');
    }
     
     
}