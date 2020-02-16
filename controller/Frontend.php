<?php 

class Frontend{
    //public $limite = 10;
    public function listPosts() 
    {
        $manager = new PostManager();
        $posts = $manager->getPosts();
        require(VIEW.'frontend/listPostsView.php');
    }
   
   public function pagin()
   {
     //if (isset($_GET['id']) && $_GET['id'] > 0) {
          $commentManag = new CommentManager();
          $manager = new PostManager();
            //$post = $manager->getPost($_GET['page']);
            $comments = $commentManag->getComments($_GET['id']);
            $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limite = 1;
        $debut = ($page - 1) * $limite;
        
        $query = $manager->pagin($limite, $debut);
        $resultFoundRows = $manager->getAllPosts();
        $nombredElementsTotal = $resultFoundRows->fetchColumn();
        $nombreDePages = ceil($nombredElementsTotal / $limite);


            require(VIEW.'frontend/postView.php');
        /*}else{
            echo 'Erreur : aucun identifiant de billet envoyé';
            
       }*/
   }
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $manager = new PostManager();
          $commentManag = new CommentManager();
            $post = $manager->getPost($_GET['id']);
            $comments = $commentManag->getComments($_GET['id']);

            //require(VIEW.'frontend/postView.php');
        }else{
            echo 'Erreur : aucun identifiant de billet envoyé';
            
       }
    }
    
    public function addComment($postId, $author, $comment, $flag)
    {
        $mod = new CommentManager();
        $affectedLines = $mod->addComment($postId, $author, $comment, $flag);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=pagin&page='. $postId);
        }

    }
    public function flagComment($commentId)
    {

        $commentManager = new CommentManager();
        $flag = $commentManager->flagComment($commentId);
        header("Location: index.php?action=pagin&page=" . $postId);

    }
    public function auteur()
    {

        require(VIEW.'frontend/Auteur.php');
    }
     
     
}