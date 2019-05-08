<?php
use App\UserEmail;
use App\Favorite;

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

if(!function_exists('checkPropertyTypeByFavoriteId')) {
  function checkPropertyTypeByFavoriteId($id) {
    
    
    $favorite = Favorite::find($id);

    if(!empty($favorite->house_id)){

      return "house";

    }
    elseif(!empty($favorite->land_id)){

      return "land";

    }
    elseif(!empty($favorite->building_id)){

      return "building";

    }
    elseif(!empty($favorite->apartment_id)){

      return "apartment";

    }
    elseif(!empty($favorite->warehouse_id)){

      return "warehouse";
      
    }
    else{

      return 0;

    }
  }
}

if(!function_exists('getPropertyTypeIdByFavoriteId')) {
  function getPropertyTypeIdByFavoriteId($id) {
    
    
    $favorite = Favorite::find($id);

    if(!empty($favorite->house_id)){

      return $favorite->house_id;

    }
    elseif(!empty($favorite->land_id)){

      return $favorite->land_id;

    }
    elseif(!empty($favorite->building_id)){

      return $favorite->building_id;

    }
    elseif(!empty($favorite->apartment_id)){

      return $favorite->building_id;

    }
    elseif(!empty($favorite->warehouse_id)){

      return $favorite->warehouse_id;
      
    }
    else{

      return 0;

    }
  }
}

?>