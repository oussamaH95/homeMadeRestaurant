<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;

class DayController extends Controller
{
    //
     //Get All Cities
     public function all() {
        $result =  Day::all(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any day.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    

    //find Day by id
    public function find($id){
        $result = Day::where('id',$id)->first();
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, Day with id ' . $id . ' cannot be found.'
             ], 400);
         }
        else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }

    //Create a Day
    public function store(Request $request){   
        $result = Day::create($request->all());
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, Day could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'Day created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

    //  update a Day
     public function update(Request $request, $id){
         $result = Day::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, Day with id ' . $id . ' cannot be found.'
             ], 400);
         }else{
                     $result = $result->fill($request->all())->save();

         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, Day could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'Day updated successfully.',
                 'result' => $result,
             ], 200);
         }
         }  
     }
     //delete a Day
     public function destroy($id)
     {
         $result = Day::where('id',$id)->first();
        
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, Day with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'Day deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'Day could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
