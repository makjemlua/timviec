<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller {
	public function index() {
		$articles = Article::with('admin:id,name')->where([
			'bo_active' => Article::STATUS_PUBLIC,
		])->orderBy('id', "DESC")->paginate(3);
		return view('blogs.index', compact('articles'));
	}
	public function detail(Request $request) {
		$url = $request->segment(2);
		$url = preg_split('/(-)/i', $url);

		if ($id = array_pop($url)) {
			$articleDetail = Article::with('admin:id,name')->find($id);
			$articles = Article::whereNotIn('id', [$id])->paginate(5);

			$comments = Comment::with('user:id,name,avatar', 'employer:id,name,em_avatar', 'replies:id,ra_parent_id,ra_user_id,ra_employer_id,ra_content,created_at')->where('ra_article_id', $id)->where('ra_parent_id', null)->orderBy('id', "DESC")->paginate(4);

			$viewData = [
				'articleDetail' => $articleDetail,
				'articles' => $articles,
				'comments' => $comments,
			];

			return view('blogs.detail', $viewData);
		}
	}
}
