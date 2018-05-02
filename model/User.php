<?php

class User extends Eloquent
{

  public function allUsers(){
    return self::all();
  }

  public function getUser($id){
    $user = self::find($id);
    if(isnull($user))
    {
      return false;
    }

    return $user;
  }

  public function saveUser(){
    $input = Input::all();
    $user = new User();
    $user->fill($input);
    $user->save();
    return $user;

  }

  public function updateUser($id){
    $input = Input::all();
    $user = self::find($id);
    $user->fill($input);
    $user->save();
    return $user;
  }

  public function deleteUser($id){
    $user = self::find($id);
    if(isnull($user))
    {
      return false;
    }

    return $user->delete();
  }

}

?>
