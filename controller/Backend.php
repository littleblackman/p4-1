<?php

class Backend
{  
    public function connect()
    {
        require (VIEW.'backend/adminLoginView.php');
    }
    
    public function adminIndex()
    {
        if(!isset($_SESSION['admin']))
        {
            throw new Exception("erreur 403");
        }
        $manager = new PostManager();
        $commtManag = new CommentManager();
        $allPosts = $manager->getAllPosts();
        $allComments = $commtManag->getAllComments();
        $flagComment = $commtManag->getFlagComment();
        require(VIEW.'backend/adminView.php');
    }
    public function login($username, $password)
    {

        $loginManager = new LoginManager();
        $login = $loginManager->getUser($username, $password);

        if($login)
        {
            
            $_SESSION['admin'] = $_POST['username'];
             header('Location: index.php?action=adminIndex');
        }    
        else
        {
            throw new Exception("Le nom ou le mot de passe est incorect");
            
        }    

    }

    public function disconnect()
    {
         session_destroy();
         header('Location: index.php');

    }

    public function deletePost() {
        $manager = new PostManager();
        $manager->delete('posts', $_GET['id']);
         header('Location: index.php?action=adminIndex');

    }
    
    public function edit()
    {
        $manager = new PostManager();
        $post = $manager->getPost($_GET['id']);
        require(VIEW.'backend/updateView.php');

    }
    public function update($title, $content, $postId)
    {
        $manager = new PostManager();
        $update = $manager->updatePost($title, $content, $postId);
        header('Location: index.php?action=adminIndex');
    }
    
    public function creatPost()
    {
        require(VIEW.'backend/creatView.php');
    }

    public function insertPost($title, $content)
    {
        $postManager = new PostManager();
        $createdPost = $postManager->creatPost($title, $content);
         if ($createdPost === true) {
            var_dump('post crée');
            header('Location: index.php?action=adminIndex');
        }
        else {
            var_dump('erreur depuis le backend');
            throw new Exception('Impossible d\'ajouter l\'article !');
            
            exit;
        }
    }

    public function deleteComment(){
        $manager = new CommentManager();
        $manager->delete('comments', $_GET['id']);

        header('Location: index.php?action=adminIndex');
         exit();
    }
}