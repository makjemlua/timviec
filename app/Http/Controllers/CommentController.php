<?php

namespace App\Http\Controllers;

use App\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
	public function savingRatingArticle(Request $request, $id) {
		if (Auth::guard('web')->user() || Auth::guard('employers')->user()) {
			$ratingArticles = new Comment();

			$ratingArticles->ra_article_id = $id;
			$ratingArticles->ra_content = $request->ra_content;
			if (Auth::guard('web')->user()) {
				$ratingArticles->ra_user_id = get_data_user('web');
			}
			if (Auth::guard('employers')->user()) {
				$ratingArticles->ra_employer_id = get_data_user('employers');
			}
			$ratingArticles->created_at = Carbon::now();
			$ratingArticles->updated_at = Carbon::now();

			//dd($ratingArticles);

			$ratingArticles->save();
			return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá');
		}

		return redirect()->back()->with('danger', 'Bạn chưa đăng nhập');
	}
	public function savingReplyComment(Request $request, $id, $reply) {
		if (Auth::guard('web')->user() || Auth::guard('employers')->user()) {
			$ratingArticles = new Comment();

			//$reply = $request->ra_id;

			$ratingArticles->ra_article_id = $id;
			$ratingArticles->ra_parent_id = $reply;
			$ratingArticles->ra_content = $request->ra_content;
			if (Auth::guard('web')->user()) {
				$ratingArticles->ra_user_id = get_data_user('web');
			}
			if (Auth::guard('employers')->user()) {
				$ratingArticles->ra_employer_id = get_data_user('employers');
			}
			$ratingArticles->created_at = Carbon::now();
			$ratingArticles->updated_at = Carbon::now();

			//dd($ratingArticles);

			$ratingArticles->save();
			return redirect()->back()->with('success', 'Cảm ơn bạn đã phản hồi');
		}

		return redirect()->back()->with('danger', 'Bạn chưa đăng nhập');
	}
}
