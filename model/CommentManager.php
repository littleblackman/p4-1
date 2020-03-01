<?php

class CommentManager extends BddManager
{
	public function addComment($postId, $author, $comment, $flag)
    {
        
        $comments = $this->getBdd()->prepare('INSERT INTO comments(post_id, author, comment,flag, comment_date) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment, $flag));

        return $affectedLines;
    }


    public function getComments($postId)
    {
        
        $comments = $this->getBdd()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }
    public function getAllComments()
    {
        
        $comment = $this->getBdd()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');
        $comment->execute();
        return $comment;
    }
    public function getFlagComment()
    {
        $flagComment = $this->getBdd()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE flag = "1" ORDER BY comment_date DESC');
        $flagComment->execute();
        return $flagComment;
    }
    public function flagComment($commentId)
    {
        
        $req = $this->getBdd()->prepare('UPDATE comments SET flag = "1" WHERE id = ?');
        $req->execute(array($commentId));
        var_dump($req->errorInfo(), $req->rowCount());
    }
    public function annulflag($commentId)
    {
        $req = $this->getBdd()->prepare('UPDATE comments SET flag = "0" WHERE id = ?');
        $req->execute(array($commentId));
        var_dump($req->errorInfo(), $req->rowCount());
    }
    
}