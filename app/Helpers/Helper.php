<?php

if(!function_exists('userNameById')) {
  function weekdays($userId) {
    
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