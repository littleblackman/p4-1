<?php
class LoginManager extends BddManager
{
    public function getUser($username, $password)
    {
       
        $reqt = $this->getBdd()->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $reqt->execute([
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);
        $user = $reqt->fetchObject();
        return $user;
        
    }
}