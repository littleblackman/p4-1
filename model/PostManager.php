<?php

require 'BddManager.php';

/**
 * Post CRUD request
 * Role: faire le lien entre le code et la BDD
 * 
 */
class PostManager extends BddManager
{

	public function getPosts()
    {
        $req = $this->getBdd()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
         return $req;
    }

    public function getAllPosts()
    {
        $request = $this->getBdd()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date DESC');
        return $request;
    }
    public function getPost($postId)
    {
        $req = $this->getBdd()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
   
    public function updatePost($id, $title, $content)
    {
        $apdt = $this->getBdd()->prepare("UPDATE posts SET  
	        	title = :title, 
	        	content = :content, 
	        	creation_date = :creation_date 
            WHERE id = :id");
        $apdt->execute([
            	'id' => $_GET['id'], 
	        	'title' => $_POST['title'], 
	        	'content' => $_POST['content'], 
	        	'creation_date' => $_POST['creation_date'],
	        	
        ]);
        return $apdt;
    }
    public function insertPost($title, $content)
	{
			$insrt = $this->getBdd()->prepare('INSERT INTO posts(title, content, create_date) VALUES(?, ?, NOW())');
		    $insrtArticle= $insrt->execute(array($title, $content));
		    return $insrtArticle;
	}


}