<?php

class ApiController extends Controller {
  protected function request($collection = null)
  {
    if($collection == null)
      return false;

    $collection = snake_case( $collection );
    // qualify the collection
    if(str_is('users', $collection))
      return false;

    $documents = MDB::collection($collection)->take(30)->get();
    $array_to_return = array();
    foreach($documents as $document)
    {
      $push = $document;
      $push['_id'] = (string) $document['_id'];
      array_push( $array_to_return, $push );
    }
    return json_encode( $array_to_return );
  }
  protected function post($collection = null)
  {
    if($collection == null)
      return false;
    $document = MDB::collection($collection)->insert($_POST);
     return json_encode( $document );
  }
}