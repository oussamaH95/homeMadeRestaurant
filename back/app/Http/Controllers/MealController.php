<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;

class MealController extends Controller
{
     //Get All meal list
     public function all() {
        $userId = auth()->user()->id;
        $result =  Meal::where('userId',$userId)->get(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any meal.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    

    //find meal by id
    public function find($id){
        $result = Meal::where('id',$id)->first();
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, meal with id ' . $id . ' cannot be found.'
             ], 400);
         }
        else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }

    //Create a meal
    public function store(Request $request){
        $input = $request->all();
        $input['userId'] = auth()->user()->id;
        $result = Meal::create($input);//->new->fill->save
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, meal could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'meal created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

    //  update a meal
     public function update(Request $request, $id){
         $result = Meal::where('id',$id)->first();;
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, meal with id ' . $id . ' cannot be found.'
             ], 400);
         }else{
                    $input = $request->all();
                    $input['userId'] = auth()->user()->id;

         if (!$input) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, meal could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'meal updated successfully.',
                 'result' => $input,
             ], 200);
         }
         }  
     }
     //delete a meal
     public function destroy($id)
     {
         $result = Meal::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, meal with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'meal deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'meal could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
