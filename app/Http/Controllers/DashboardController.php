<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //this function will send the users array from the
    //controller to the view (html/css)
    public function index(){
        $users = [
            [
                'name' => 'Alex',
                'age' => 30,
            ],
            [
                'name'  => 'Dan',
                'age' => 25,
            ],
            [
                'name' => 'Mohamed',
                'age' => 17,
            ]
            ];
        return view(
            'dashboard',
            [
                'usersList' => $users
            ]
            );
    }
}
