<?php


class Controller
{

    protected $session;

    public function __construct() {
          $this->session = new Session();
    }
}
