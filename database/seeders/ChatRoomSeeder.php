<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Room 1',
            ],
            [
                'name' => 'Room 2',
            ],
            [
                'name' => 'Room 3',
            ],
            [
                'name' => 'Room 4',
            ],
        ];
        ChatRoom::insert($data);
    }
}
