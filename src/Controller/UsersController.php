<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
  public function index()
  {
    $this->paginate = [
      "limit" => 20,
      "order" => [
        "Users.id" => "asc"
      ]
    ];

    $usuarios = $this->paginate($this->Users);
    $this->set( compact('usuarios') );
  }

  public function view($id = NULL)
  {
    $usuario = $this->Users->get($id);
    $this->set(['usuario'=>$usuario]);
  }
}