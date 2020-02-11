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
        $allPosts = $manager->getAllPosts();
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
         header('index.php?action=adminIndex');

        
    }
    
    public function edit($id)
    {
        $manager = new PostManager();
        $post = $manager->getPost($_GET['id']);
        require(VIEW.'backend/updateView.php');

    }
    public function update($title, $content)
    {
        $manager = new PostManager();
        $upd = $manager->updatePost($title, $content);
        header('Location: index.php?action=adminIndex');
    }
    
    public function creatPost()
    {
        require(VIEW.'backend/creatView.php');
    }

    public function setPost($title, $content)
    {
        $postManager = new PostManager();
        $createdPost = $postManager->insertPost($title, $content);
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