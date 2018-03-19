<?php

namespace App\Http\Controllers;
use App\Pleasure;
use Illuminate\Http\Request;

class PleasureController extends Controller
{
  function showAll(Request $request){
      if($request->isJson()){
          $pleasures = Pleasure::all();
          $category = $request->get('category');
          if(isset($category) && is_numeric($category) ){
            $pleasures = Pleasure::where('category_id', $category)->get();
          }
          $user = $request->get('user');
          if(isset($user)&& is_numeric($user)){
            $pleasures = Pleasure::where('user_id', $user)->get();
          }
          $name = $request->get('name');
          if(isset($name) ){
            $pleasures = Pleasure::where('name', 'like' ,'%'.$name.'%')->get();
          }
          return response()->json($pleasures,200);
      }
  }
  function createPleasure(Request $request){
      if($request->isJson()){
          $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'user_id' => 'required|numeric'
          ]);
          $data = $request->json()->all();
          $pleasure = Pleasure::create([
                'name' => $data["name"],
                'description' => $data["description"],
                'category_id' => $data["category_id"],
                'user_id' => $data["user_id"]
          ]);
          return response()->json($pleasure,201);
      }
  }
  function showPleasure(Request $request,$id){
      if($request->isJson()){
        echo is_numeric($id);
          if(!is_numeric($id)){
            return response()->json(['error'=>'id must be a number'],404);
          }else{
            $pleasure = Pleasure::find($id);
            if( ! $pleasure ){
                return response()->json(['message'=>'Record not found'],404);
            }else{
                return response()->json($pleasure,200);
            }
          }
      }
  }
  function updatePleasure(Request $request,$id){
      if($request->isJson()){
          $data = $request->json()->all();
          if(!is_numeric($id)){
            return response()->json(['error'=>'id must be a number'],404);
          }else{
          $pleasure = Pleasure::find($id);
          if( ! $pleasure ){
              return response()->json(['message'=>'Record not found'],404);
          }else{
              $this->validate($request, [
                'name' => 'required|string',
                'description' => 'required|string|max:255',
                'category_id' => 'required|numeric',
                'user_id' => 'required|numeric'
              ]);
              $pleasure->name = $data['name'];
              $pleasure->description = $data["description"];
              $pleasure->category_id = $data["category_id"];
              $pleasure->user_id = $data["user_id"];
              $pleasure->save();
              return response()->json('',204);
          }
        }
      }
  }
  function deletePleasure(Request $request,$id){
      if($request->isJson()){
        if(!is_numeric($id)){
          return response()->json(['error'=>'id must be a number'],404);
        }else{
          $pleasure = Pleasure::find($id);
          if( ! $pleasure ){
              return response()->json(['message'=>'Record not found'],404);
          }else{
              try{
                  $pleasure->delete();
                  return response()->json('',204);
              }catch(\Exception $e){
                  return response()->json(['error' => $e->getMessage()],400);
              }
          }
        }
      }
  }
}
