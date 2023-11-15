<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;

class PusherController extends Controller
{
    public function index(){
        return view('index');
    }
    public function broadcast(Request $request){
        broadcast(new PusherBroadcast($request->get(key:'message')))->toOther();
        return view("broadcast", ['message' => $request->get('message')]);
    }
    public function receive(Request $request){
        return view("receive", ['message' => $request->get('message')]);
    }
}
