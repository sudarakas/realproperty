<?php
use App\UserEmail;
use App\Favorite;
use App\Offer;
use Illuminate\Support\Facades\DB;

if (!function_exists('userNameById')) {
  function userNameById($userId)
  {

    $user = App\User::find($userId);

    if ($user) {
      return $user->name;
    } else {
      return NULL;
    }
  }
}

if (!function_exists('userAvatarById')) {
  function userAvatarById($userId)
  {

    $user = App\User::find($userId);

    if ($user) {
      return $user->avatar;
    } else {
      return NULL;
    }
  }
}

if (!function_exists('countMessageByUserId')) {
  function countMessageByUserId()
  {

    $id = Auth::user()->id;
    $messageCount = UserEmail::where(function ($query) use ($id) {

      $query->where('receiver_id', '=', $id);
    })->where(function ($query) use ($id) {

      $query->where('status', 'LIKE', 'unread');
    })->count();

    if ($messageCount) {
      return $messageCount;
    } else {
      return 0;
    }
  }
}

if (!function_exists('checkPropertyTypeByFavoriteId')) {
  function checkPropertyTypeByFavoriteId($id)
  {


    $favorite = Favorite::find($id);

    if (!empty($favorite->house_id)) {

      return "house";
    } elseif (!empty($favorite->land_id)) {

      return "land";
    } elseif (!empty($favorite->building_id)) {

      return "building";
    } elseif (!empty($favorite->apartment_id)) {

      return "apartment";
    } elseif (!empty($favorite->warehouse_id)) {

      return "warehouse";
    } else {

      return 0;
    }
  }
}

if (!function_exists('getPropertyTypeIdByFavoriteId')) {
  function getPropertyTypeIdByFavoriteId($id)
  {


    $favorite = Favorite::find($id);

    if (!empty($favorite->house_id)) {

      return $favorite->house_id;
    } elseif (!empty($favorite->land_id)) {

      return $favorite->land_id;
    } elseif (!empty($favorite->building_id)) {

      return $favorite->building_id;
    } elseif (!empty($favorite->apartment_id)) {

      return $favorite->building_id;
    } elseif (!empty($favorite->warehouse_id)) {

      return $favorite->warehouse_id;
    } else {

      return 0;
    }
  }
}

if (!function_exists('checkPropertyTypeByOfferId')) {
  function checkPropertyTypeByOfferId($id)
  {


    $offer = Offer::find($id);

    if (!empty($offer->house_id)) {

      return "house";
    } elseif (!empty($offer->land_id)) {

      return "land";
    } elseif (!empty($offer->building_id)) {

      return "building";
    } elseif (!empty($offer->apartment_id)) {

      return "apartment";
    } elseif (!empty($offer->warehouse_id)) {

      return "warehouse";
    } else {

      return 0;
    }
  }
}

if (!function_exists('getPropertyTypeIdByOfferId')) {
  function getPropertyTypeIdByOfferId($id)
  {


    $offer = Offer::find($id);

    if (!empty($offer->house_id)) {

      return $offer->house_id;
    } elseif (!empty($offer->land_id)) {

      return $offer->land_id;
    } elseif (!empty($offer->building_id)) {

      return $offer->building_id;
    } elseif (!empty($offer->apartment_id)) {

      return $offer->building_id;
    } elseif (!empty($offer->warehouse_id)) {

      return $offer->warehouse_id;
    } else {

      return 0;
    }
  }
}

if (!function_exists('checkPropertyTypeById')) {
  function checkPropertyTypeById($id)
  {


    $house = DB::table('houses')->where('property_id', $id)->count();

    if ($house == 1) {

      return "house";
    } else {

      $land = DB::table('lands')->where('property_id', $id)->count();

      if ($land == 1){

        return "land";

      } else {

        $building = DB::table('buildings')->where('property_id', $id)->count();

        if ($building == 1) {

          return "building";

        }else{

          $apartment = DB::table('apartments')->where('property_id', $id)->count();

          if ($apartment == 1) {

            return "apartment";
  
          }else{

            $warehouse = DB::table('warehouses')->where('property_id', $id)->count();

            if ($warehouse == 1) {

              return "warehouse";
    
            }else{
              return 0;
            }
          }

        }
      }
    }
  }
}

if (!function_exists('getPropertyTypeIdById')) {
  function getPropertyTypeIdById($id)
  {


    $house = DB::table('houses')->where('property_id', $id)->get();

    if ($house->count() == 1) {

      return $house[0]->id;
    } else {

      $land = DB::table('lands')->where('property_id', $id)->get();

      if ($land->count() == 1){

        return $land[0]->id;

      } else {

        $building = DB::table('buildings')->where('property_id', $id)->get();

        if ($building->count() == 1) {

          return $building[0]->id;

        }else{

          $apartment = DB::table('apartments')->where('property_id', $id)->get();

          if ($apartment->count() == 1) {

            return $apartment[0]->id;
  
          }else{

            $warehouse = DB::table('warehouses')->where('property_id', $id)->get();

            if ($warehouse->count() == 1) {

              return $warehouse[0]->id;
    
            }else{
              return 0;
            }
          }

        }
      }
    }
  }
}






















?>