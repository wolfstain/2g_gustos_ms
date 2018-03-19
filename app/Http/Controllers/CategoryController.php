<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    function showAll(Request $request){
        if($request->isJson()){
            $categories = Category::all();
            return response()->json($categories,200);
        }
    }
    function createCategory(Request $request){
        if($request->isJson()){
          $this->validate($request, [
            'name' => 'required|string|unique:categories,name',
            'description' => 'required|max:255',
            ]);
            $data = $request->json()->all();
            $category = Category::create([
                  'name' => $data["name"],
                  'description' => $data["description"]
            ]);
            return response()->json($category,201);
        }
    }
    function showCategory(Request $request,$id){
        if($request->isJson()){
          if(!is_numeric($id)){
            return response()->json(['error'=>'id must be a number'],404);
          }else{
              $category = Category::find($id);
              if( ! $category ){
                  return response()->json(['message'=>'Record not found'],404);
              }else{
                  return response()->json($category,200);
              }
          }
      }
    }
    function updateCategory(Request $request,$id){
        if($request->isJson()){
            $data = $request->json()->all();
            if(!is_numeric($id)){
              return response()->json(['error'=>'id must be a number'],404);
            }else{
              $category = Category::find($id);
              if( ! $category ){
                  return response()->json(['message'=>'Record not found'],404);
                }else{
                  $this->validate($request, [
                    'name' => 'required|string|unique:categories,name',
                    'description' => 'required|max:255',
                  ]);
                  $category->name = $data['name'];
                  $category->description = $data["description"];
                  $category->save();
                  return response()->json('',204);
              }
            }
        }
    }
    function deleteCategory(Request $request,$id){
        if($request->isJson()){
          if(!is_numeric($id)){
            return response()->json(['error'=>'id must be a number'],404);
          }else{
            $category = Category::find($id);
            if( ! $category ){
                return response()->json(['message'=>'Record not found'],404);
            }else{
                try{
                    $category->delete();
                    return response()->json('',204);
                }catch(\Exception $e){
                    return response()->json(['error' => $e->getMessage()],400);
                }
            }
          }
        }
    }
}
