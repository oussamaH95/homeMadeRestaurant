<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    //
     //Get All Cities
     public function all() {
        $result =  City::all(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any City.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    

    //find City by id
    public function find($id){
        $result = City::where('id',$id)->first();
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, city with id ' . $id . ' cannot be found.'
             ], 400);
         }
        else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }

    //Create a City
    public function store(Request $request){   
        $result = City::create($request->all());
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, city could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'City created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

    //  update a City
     public function update(Request $request, $id){
         $result = City::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, city with id ' . $id . ' cannot be found.'
             ], 400);
         }else{
                     $result = $result->fill($request->all())->save();

         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, city could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'City updated successfully.',
                 'result' => $result,
             ], 200);
         }
         }  
     }
     //delete a City
     public function destroy($id)
     {
         $result = City::where('id',$id)->first();
        
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, city with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'City deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'City could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
