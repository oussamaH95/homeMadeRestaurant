<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuList;

class MenuListController extends Controller
{
    //
     //Get All menu list
     public function all() {
        $userId = auth()->user()->id;
        $result =  MenuList::where('userId',$userId)->get(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any menu.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    

    //find Menu by id
    public function find($id){
        $result = MenuList::where('id',$id)->first();
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, menu with id ' . $id . ' cannot be found.'
             ], 400);
         }
        else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }

    //Create a Menu
    public function store(Request $request){
        $input = $request->all();
        $input['userId'] = auth()->user()->id;
        $result = MenuList::create($input);//->new->fill->save
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, Menu could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'Menu created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

    //  update a Menu
     public function update(Request $request, $id){
         $result = MenuList::where('id',$id)->first();;
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, menu with id ' . $id . ' cannot be found.'
             ], 400);
         }else{
                    $input = $request->all();
                    $input['userId'] = auth()->user()->id;

         if (!$input) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, menu could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'Menu updated successfully.',
                 'result' => $input,
             ], 200);
         }
         }  
     }
     //delete a Menu
     public function destroy($id)
     {
         $result = MenuList::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, menu with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'Menu deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'Menu could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
