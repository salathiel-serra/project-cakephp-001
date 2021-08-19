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

  public function add()
  {
    $user = $this->Users->newEntity();

    if ($this->request->is('post')) {
      $user = $this->Users->patchEntity($user, $this->request->getData());
      // debug($user);
      // exit;

      if ($this->Users->save($user)) {
        
        $this->Flash->success(__('Usuário cadastrado com sucesso!'));
        return $this->redirect(['action'=>'index']);

      } else {
        $this->Flash->error(__('Erro: Usuário não foi cadastrado com sucesso!'));
      }

    }

    $this->set( compact('user') );
  }
}