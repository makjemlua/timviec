<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminJobController extends Controller {
	public function index(Request $request) {
		$jobs = Job::whereRaw(1);

		if ($request->search) {
			$jobs->where('name', 'like', '%' . $request->search . '%');
		}

		$jobs = $jobs->paginate(20);

		$viewData = [
			'jobs' => $jobs,
		];
		return view('admin::jobs.index', $viewData);
	}
	public function create() {
		return view('admin::jobs.create');
	}
	public function store(Request $requestJob) {
		//dd($requestJob->all());
		$this->insertOrUpdate($requestJob);
		return redirect()->back()->with('success', 'Thêm thành công');

	}
	public function edit($id) {
		$job = Job::find($id);
		return view('admin::jobs.update', compact('job'));
	}
	public function update(Request $requestJob, $id) {
		$job = Job::find($id);

		$this->insertOrUpdate($requestJob, $id);
		return redirect()->back();
	}
	public function insertOrUpdate($requestJob, $id = '') {
		$job = new Job();
		if ($id) {
			$job = Job::find($id);
		}
		$job->name = $requestJob->name;
		$job->slug = Str::slug($requestJob->name);
		$job->created_at = Carbon::now();
		$job->updated_at = Carbon::now();
		$job->save();
	}
	public function action($action, $id) {
		if ($action) {
			$job = Job::find($id);
			switch ($action) {
			case 'delete':
				$job->delete();
				break;
			}
		}
		return redirect()->back();
	}
}
