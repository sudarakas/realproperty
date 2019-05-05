<?php

if(!function_exists('userNameById')) {
  function userNameById($userId) {
    
    $user = App\User::find($userId);

    if($user){
      return $user->name;
    }
    else{
      return NULL;
    }
  }
}

?>