<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestaurantMealType;

class RestaurantMealTypeController extends Controller
{

    //Create a RestaurantMealType
    public function store(Request $request){
        $input = $request->all();
        $input['userId'] = auth()->user()->id;
        $result = RestaurantMealType::create($input);//->new->fill->save
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, RestaurantMealType could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'RestaurantMealType created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

     //delete a RestaurantMealType
     public function destroy($id)
     {
         $result = RestaurantMealType::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, RestaurantMealType with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'RestaurantMealType deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'RestaurantMealType could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
