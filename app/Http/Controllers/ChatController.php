<?php

namespace App\Http\Controllers;

use App\Model\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class ChatController extends Controller {
	public function index() {
		// select all users except logged in user
		// $users = User::where('id', '!=', Auth::id())->get();

		// count how many message are unread from the selected user
		// $employers = DB::select("select employers.id, employers.name, employers.em_avatar, employers.email, count(ch_read) as unread
		//       from employers LEFT  JOIN  chat ON employers.id = chat.ch_to and ch_read = 0 and chat.ch_to = " . Auth::id() . "
		//       group by employers.id, employers.name, employers.em_avatar, employers.email");
		$employers = Chat::with('userToEmployer:id,name,email,em_avatar')->where('ch_from', get_data_user('web'))->select('ch_to')->distinct()->get();

		$viewData = [
			'employers' => $employers,
		];

		return view('chat.index', $viewData);
	}

	public function getMessage($user_id) {
		$my_id = Auth::id();

		// Make read all unread message
		Chat::where(['ch_from' => $user_id, 'ch_to' => $my_id])->update(['ch_read' => 1]);

		// Get all message from selected user
		$messages = Chat::where(function ($query) use ($user_id, $my_id) {
			$query->where('ch_from', $user_id)->where('ch_to', $my_id);
		})->oRwhere(function ($query) use ($user_id, $my_id) {
			$query->where('ch_from', $my_id)->where('ch_to', $user_id);
		})->get();

		return view('chat.message', ['messages' => $messages]);
	}

	public function sendMessage(Request $request) {
		$ch_from = Auth::id();
		$ch_to = $request->receiver_id;
		$message = $request->message;

		$data = new Chat();
		$data->ch_from = $ch_from;
		$data->ch_to = $ch_to;
		$data->message = $message;
		$data->ch_read = 0; // message will be unread when sending message
		$data->save();

		// pusher
		$options = array(
			'cluster' => 'ap1',
			//'useTLS' => true,
			//'encrypted' => true,
		);

		$pusher = new Pusher(
			env('PUSHER_APP_KEY'),
			env('PUSHER_APP_SECRET'),
			env('PUSHER_APP_ID'),
			$options
		);

		$data =
			[
			'ch_from' => $ch_from,
			'ch_to' => $ch_to,
			'message' => $message,
		]; // sending from and to user id when pressed enter
		$pusher->trigger('my-channel', 'my-event', $data);
		//dd($a);
		// event(new Chat($data['message']));
		// return response()->json(['message' => $data['message']], 200);
	}

}
