<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        return view('chat');
    }

    public function rooms(Request $request){
        try {
            $rooms = ChatRoom::all();
            return response()->json([
                'status' => true,
                'message' => 'Data get successfully',
                'auth' => Auth::user(),
                'data' => $rooms
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }


    public function messages(Request $request, $roomId){
        try {
            $message = ChatMessage::with('user')
                ->where('chat_room_id', $roomId)
                ->orderBy('id', 'ASC')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Data get successfully',
                'data' => $message
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function newChatMessage(Request $request, $roomId){
        try {
            $chatMessage = ChatMessage::create([
                'chat_room_id' => $roomId,
                'user_id' => Auth::user()->id,
                'message' => $request->message,
            ]);

            broadcast(new NewChatMessage($chatMessage))->toOthers();

            return response()->json([
                'status' => true,
                'message' => 'Message successfully send'
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }


}
