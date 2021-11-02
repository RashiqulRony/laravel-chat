<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatFile;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use App\Models\UserChatSession;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        return view('chat');
    }

    public function all(Request $request){
        try {
            $auth = Auth::user();
            $rooms = ChatRoom::all();
            $users = User::where('id', '!=', $auth->id)->get();
            return response()->json([
                'status' => true,
                'message' => 'Data get successfully',
                'auth' => $auth,
                'rooms' => $rooms,
                'users' => $users
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }


    public function messages(Request $request){
        try {

            $conId = $request->sender_id + $request->receiver_id;
            $message = UserChatSession::with('messages')
                ->where('conversation_id', $conId)
                ->first();

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

    public function newChatMessage(Request $request){
        try {

            $conId = $request->sender_id + $request->receiver_id;

            $chatSession = UserChatSession::updateOrCreate(
                ['conversation_id'   => $conId],
                ['conversation_secret' => bcrypt($conId)]
            );

            if (isset($chatSession)) {
                $chatMessage = UserMessage::create([
                    'chat_session_id' => $chatSession->id,
                    'user_id'         => $request->sender_id,
                    'message'         => $request->message,
                    'type'            => $request->type,
                ]);

                broadcast(new NewChatMessage($chatMessage))->toOthers();
            }

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

    public function deleteSingleFile($chatId, $fileId) {
        try {
            $file = ChatFile::find($fileId);
            if (isset($file)) {
                $chatMessage = ChatMessage::find($file->chat_id);
                $image = new MediaController();
                $image->delete('files', $file->name,);
                $file->delete();

                if (isset($chatMessage)) {
                    broadcast(new NewChatMessage($chatMessage))->toOthers();
                }
                return response()->json([
                    'status' => true,
                    'message' => 'File delete successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Something went wrong, File can't delete."
                ]);
            }

        }catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function chatDelete($chatId) {
        try {
            $chatMessage = ChatMessage::with('files')->find($chatId);
            if (isset($chatMessage)) {
                if (!empty($chatMessage->files)) {
                    foreach ($chatMessage->files as $file):
                        $image = new MediaController();
                        $image->delete('files', $file->name,);
                        $file->delete();
                    endforeach;
                }
                broadcast(new NewChatMessage($chatMessage))->toOthers();
                $chatMessage->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'File delete successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Something went wrong, File can't delete."
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }


}
