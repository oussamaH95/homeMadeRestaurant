<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MealType;

class MealTypeController extends Controller
{
    //
     //Get All Cities
     public function all() {
        $result =  MealType::all(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any MealType.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    

    //find MealType by id
    public function find($id){
        $result = MealType::where('id',$id)->first();
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, MealType with id ' . $id . ' cannot be found.'
             ], 400);
         }
        else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }

    //Create a MealType
    public function store(Request $request){   
        $result = MealType::create($request->all());
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, MealType could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'MealType created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

    //  update a MealType
     public function update(Request $request, $id){
         $result = MealType::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, MealType with id ' . $id . ' cannot be found.'
             ], 400);
         }else{
                     $result = $result->fill($request->all())->save();

         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, MealType could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'MealType updated successfully.',
                 'result' => $result,
             ], 200);
         }
         }  
     }
     //delete a MealType
     public function destroy($id)
     {
         $result = MealType::where('id',$id)->first();
        
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, MealType with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'MealType deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'MealType could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
