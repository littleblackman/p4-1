<?php


/**
 * Comment CRUD request
 * 
 */
class CommentManager extends BddManager
{
	public function postComment($postId, $author, $comment)
    {
        
        $comments = $this->getBdd()->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }


    public function getComments($postId)
    {
        
        $comments = $this->getBdd()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

}