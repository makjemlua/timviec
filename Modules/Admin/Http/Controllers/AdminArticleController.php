<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestBlogAdmin;
use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminArticleController extends Controller {
	public function index(Request $request) {
		$articles = Article::whereRaw(1)->orderBy('id', "DESC");

		if ($request->search) {
			$articles->where('bo_title', 'like', '%' . $request->search . '%');
		}

		$articles = $articles->paginate(5);

		$viewData = [
			'articles' => $articles,
		];
		return view('admin::article.index', $viewData);
	}
	public function create() {
		return view('admin::article.create');
	}
	public function store(RequestBlogAdmin $requestArticle) {
		//dd($requestArticle->all());
		$this->insertOrUpdate($requestArticle);
		return redirect()->back()->with('success', 'Thêm thành công');

	}
	public function edit($id) {
		$article = Article::find($id);
		return view('admin::article.update', compact('article'));
	}
	public function update(Request $requestArticle, $id) {
		$article = Article::find($id);

		$this->insertOrUpdate($requestArticle, $id);
		return redirect()->back()->with('success', 'Cập nhập thành công');
	}
	public function insertOrUpdate($requestArticle, $id = '') {
		$article = new Article();
		if ($id) {
			$article = Article::find($id);
		}
		$article->bo_admin_id = get_data_user('admins', 'id');
		$article->bo_title = $requestArticle->bo_title;
		$article->bo_slug = Str::slug($requestArticle->bo_title);
		$article->bo_description = $requestArticle->bo_description;
		$article->bo_content = $requestArticle->bo_content;
		$article->bo_active = $requestArticle->input('bo_active');
		$article->created_at = Carbon::now();
		$article->updated_at = Carbon::now();
		if ($requestArticle->hasFile('avatar')) {
			$file = upload_image('avatar');
			if (isset($file['name'])) {
				$article->bo_avatar = $file['name'];
			}
		}
		$article->save();
	}
	public function action($action, $id) {
		if ($action) {
			$article = Article::find($id);
			switch ($action) {
			case 'delete':
				$article->delete();
				break;
			case 'active':
				$article->bo_active = $article->bo_active ? 0 : 1;
				$article->save();
				break;
			}
		}
		return redirect()->back();
	}
}
