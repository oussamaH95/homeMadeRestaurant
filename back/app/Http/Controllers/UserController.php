<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
       //
     //Get All user list
     public function all() {
        $userId = auth()->user()->id;
        $result =  User::where('userId',$userId)->get(); 
        if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, cannot be found any user.'
             ], 400);
         }
         else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    //find user by id
    public function find($id){
        $result = User::where('id',$id)->first();
         if (!$result) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, user with id ' . $id . ' cannot be found.'
             ], 400);
         }
        else return response()->json([
                 'success' => true,
                 'result' => $result,
             ], 200);
         }
    //  update a user
     public function update(Request $request){
         $result = User::where('id',auth()->user()->id)->first();;
            $input = $request->all();

         if (!$input) {
             return response()->json([
                 'success' => false,
                 'message' => 'Sorry, user could not be updated.'
             ], 500);
         } else {
             return response()->json([
                 'success' => true,
                 'message' => 'user updated successfully.',
                 'result' => $input,
             ], 200);
         }   
     }
     //delete a user
     public function destroy()
     {
         $result = User::where('id',auth()->user()->id)->first();
 
         if ($result->delete()) {
             return response()->json([
                 'success' => true,
                 'message' => 'user deleted successfully.'   
             ], 200);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'user could not be deleted.',
                 'result' => $result,
             ], 500);
         }
     }
}
