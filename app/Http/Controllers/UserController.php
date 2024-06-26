<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser(){

        $users = [
            [
                'id'=>'1',
                'name'=>'Sam',
            ],
            [
                'id'=>'2',
                'name'=>'Quan',
            ],
        ];

        return view('list-user',compact('users'));
    }

    public function getUser($id,$name =''){
        echo $id;
        echo $name;
    
    }

    public function updateUser(Request $request){
        echo $request->id;
    }
}
