<?php



require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/LoginManager.php';


class Backend
{  
    public function connect()
    {
        require 'view/backend/adminLoginView.php';
    }

    public function login($username, $password)
    {

        $loginManager = new LoginManager();
        $login = $loginManager->getUser($username, $password);

        if($login)
        {
            session_start();
            $_SESSION['admin'] = $_POST['username'];
                header('location: index.php?action=listAllPosts');
    
        }    
            else
            {
            throw new Exception("ce n'est pas le bon mot de pass");
            
            }    
    
         

    }

    public function listAllPosts() 
    {

        $manager = new PostManager();
        $allPosts = $manager->getAllPosts();
        require('view/backend/adminView.php');
    }  
    public function deletePost() {
        $manager = new PostManager();
        $manager->delete('posts', $_GET['id']);
         header('index.php?action=listAllPosts');

        
    }

    public function creatPost()
    {
        require('view/backend/insertView.php');
    }

    public function setPost($title, $content)
    {
        $manager = new PostManager();
        $newPosts = $manager->insertPost($_POST['title'], $_POST['content']);
        require('view/backend/insertView.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $mod = new CommentManager();
        $affectedLines = $mod->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }

    }

    public function deleteComment(){
        $manager = PostManager();
        $manager->delete('comments', $_GET['id']);

        header('index.php?action=listPosts');
         exit();
    }
}