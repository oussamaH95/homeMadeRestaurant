<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
        //
     //Get All schedule list
     public function all() {
        $userId = auth()->user()->id;
        $result =  Schedule::where('userId',$userId)->get(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any schedule.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }

    //Create a schedule
    public function store(Request $request){
        $input = $request->all();
        $input['userId'] = auth()->user()->id;
        $result = Schedule::create($input);//->new->fill->save
                 if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, schedule could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'schedule created successfully.',
                 'result' => $result,

             ], 200);
         }
    }

    //  update a schedule
     public function update(Request $request, $id){
         $result = Schedule::where('id',$id)->first();;
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, schedule with id ' . $id . ' cannot be found.'
             ], 400);
         }else{
                    $input = $request->all();
                    $input['userId'] = auth()->user()->id;

         if (!$input) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, schedule could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'schedule updated successfully.',
                 'result' => $input,
             ], 200);
         }
         }  
     }
     //delete a schedule
     public function destroy($id)
     {
         $result = Schedule::where('id',$id)->first();
 
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, schedule with id ' . $id . ' cannot be found.'
             ], 400);
         }
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'schedule deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'schedule could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
