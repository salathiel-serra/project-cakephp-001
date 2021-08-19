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

  public function edit($id = NULL)
  {
    $user = $this->Users->get($id);

    if ($this->request->is(['post', 'put'])) {
      $user = $this->Users->patchEntity($user, $this->request->getData());

      if ($this->Users->save($user)) {
        
        $this->Flash->success(__('Usuário atualizado com sucesso!'));
        return $this->redirect(['action'=>'index']);

      } else {
        $this->Flash->error(__('Erro: Não foi possível atualizar usuário!'));
      }
    }
    $this->set( compact('user') );
  }

  public function delete($id = NULL)
  {
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);

    if ($this->Users->delete($user)) {
      
      $this->Flash->success(__('Usuário removido com sucesso!'));
    } else {

      $this->Flash->error(__('Erro: Não foi possível remover usuário!'));
    }

    return $this->redirect(['action'=>'index']);
  }
}