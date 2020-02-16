<?php

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
    public function pagin($limite, $debut)
    {
        $query = $this->getBdd()->prepare('SELECT * FROM posts LIMIT :limite OFFSET :debut');
        $query->bindValue('limite', $limite, PDO::PARAM_INT);
        $query->bindValue('debut', $debut, PDO::PARAM_INT);
        $query->execute();
        return $query;
    }
    public function getPost($postId)
    {
        $req = $this->getBdd()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
   
    public function updatePost($title, $content, $postId)
    {

        $request = $this->getBdd()->prepare("UPDATE posts SET title = ?, content = ?, date_modification = NOW() WHERE id = ?");
        
        $update = $request->execute(array($title, $content, $postId));
         return $update;
    }
    public function creatPost($title, $content)
	{
        $insert = $this->getBdd()->prepare('INSERT INTO posts(title, content, creation_date, date_modification) VALUES(?, ?, NOW(), NOW())');
        $newPost = $insert->execute(array($title, $content));
        
            return $newPost;
	}


}