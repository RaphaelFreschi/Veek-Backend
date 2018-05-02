<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user = null;

    public function _construct(User $user){
      $this->user = $user;
    }

    public function allUsers(){
      return Response::json($this->user->allUsers(), 200);
    }

    public function getUser($id){
      $user = $this->user->getUser($id);
      if(!$user)
      {
        return Response::json(['response' => 'Usuário não encontrado!!'], 400);
      }

      return Response::json($user, 200);

    }

    public function saveUser(){
      return Response::json($this->user->saveUser(), 200);
    }

    public function updateUser($id){
      $user = $this->user->updateUser($id);
      if(!$user)
      {
        return Response::json(['response' => 'Usuário não encontrado!!'], 400);
      }

      return Response::json($user, 200);
    }

    public function deleteUser($id){
      $user = $this->user->deleteUser($id);

      if(!$user)
      {
        return Response::json(['response' => 'Usuário não encontrado!'], 400);
      }

      return Response::json(['response' => 'Usuário removido com sucesso!'], 200);
    }

}
