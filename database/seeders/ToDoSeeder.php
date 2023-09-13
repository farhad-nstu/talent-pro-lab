<?php

namespace Database\Seeders;

use App\Models\ToDo;
use Illuminate\Database\Seeder;

class ToDoSeeder extends Seeder
{
    public function run()
    {
        // we will get json data from api. but right now i'm doing in php so i make json data as my own way. and will save it to db as json format
        $data = [
            0 => [
                "shop_id" => "123",
                "code" => 1,
                "success" => 1,
                "extra" => "shop_id 123 is authorized successfully",
                "data" => [
                    "more_info" => "more_info"
                ],
                "timestamp" => 1470198856
            ],
            1 => [
                "seller_id" => "9999",
                "message_type" => 0,
                "data" => [
                    "order_status" => "This is a test message",
                    "trade_order_id" => "123456",
                    "trade_order_line_id" => "12345",
                    "status_update_time" => 1656915866
                ],
                "timestamp" => 1,
                "site" => "lazada_sg"
            ],
        ];

        foreach ($data as $d) {
            $todo = new ToDo();
            $todo->details = json_encode($d);
            $todo->save();
        }
    }
}
