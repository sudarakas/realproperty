<?php
use App\UserEmail;

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

if(!function_exists('userAvatarById')) {
  function userAvatarById($userId) {
    
    $user = App\User::find($userId);

    if($user){
      return $user->avatar;
    }
    else{
      return NULL;
    }
  }
}

if(!function_exists('countMessageByUserId')) {
  function countMessageByUserId() {
    
    $id = Auth::user()->id;
    $messageCount = UserEmail::where(function($query) use ($id) 
      {

        $query->where('receiver_id','=', $id);

      })->where(function ($query) use ($id) {

        $query->where('status', 'LIKE', 'unread');

      })->count();

    if($messageCount){
      return $messageCount;
    }
    else{
      return 0;
    }
  }
}
