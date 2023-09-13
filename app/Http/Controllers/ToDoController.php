<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index(Request $request)
    {
        // we will get json data from api. but right now i'm doing in php so i make json data as my own way. and will save it to db as json format
        // $data = [
        //     "seller_id" => "9999",
        //     "message_type" => 0,
        //     "data" => [
        //         "order_status" => "This is a test message",
        //         "trade_order_id" => "123456",
        //         "trade_order_line_id" => "12345",
        //         "status_update_time" => 1656915866
        //     ],
        //     "timestamp" => 1,
        //     "site" => "lazada_sg"
        // ];
        
        // $todo = new ToDo();
        // $todo->details = json_encode($data);
        // $todo->save();

        $todos = ToDo::all();
        return view('admin.todos.list', compact('todos'));
    }
}
