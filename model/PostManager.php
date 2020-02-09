<?php

//require 'BddManager.php';

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
   
    public function updatePost($title, $content)
    {

        $request = $this->getBdd()->prepare("UPDATE posts SET  
	        	title = ?, 
	        	content = ?, 
	        	date_modification = NOW() 
            WHERE id = ?");

        $request->execute($title, $content, $date_modification);
        
        return $request;
    }
    public function insertPost($title, $content)
	{

        $insert = $this->getBdd()->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $newPost = $insert->execute(array($title, $content));
        
            return $newPost;
	}


}