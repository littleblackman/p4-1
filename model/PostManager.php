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
   
    public function updatePost($postId)
    {
        $apdt = $this->getBdd()->prepare("UPDATE posts SET 
	        	id = :nvid, 
	        	title = :nvtitle, 
	        	content = :nvcontent, 
	        	creation_date = :nvdate 
            where id = :nvpostId");
        $apdt->execute(array(
            	'nvid' => $nvid, 
	        	'nvtitle' => $nvtitle, 
	        	'nvcontent' => $nvcontent, 
	        	'nvdate' => $nvdate,
	        	'nvpostId' => $nvpostId
        ));
        return $apdt;
    }
    public function insertPost($title, $content)
	{
			$insrt = $this->getBdd()->prepare('INSERT INTO posts(title, content, create_date) VALUES(?, ?, ?, NOW())');
		    $insrt->execute(array($title, $content));
		    return $insrt;
	}


}