<?php

abstract class BddManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=myprojet04;charset=utf8', 'root', '');
    }

    public function getBdd()
    {
        return $this->bdd;
    }
    public function delete($table, $id)
    {
        $db = $this->bdd;
        $delt = $db->exec("DELETE FROM $table WHERE id = $id ");
        return $delt;
    }
    public function setpass()
    {
        $pass_hache = password_hash('kahina', PASSWORD_DEFAULT);
        $ret = $this->getBdd()->prepare('INSERT INTO users(pseudo, pass) VALUES(:pseudo, :pass');
        $ret->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass_hache
        ));
        
    }
   
}