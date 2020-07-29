<?php

namespace App\Console\Commands;

use App\Model\Employer;
use App\Model\EmployerProfile;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostCommand extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'status:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update VIP';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		//$deleteSaveProfile = SaveProfileEmployer::whereDate('created_at', '<', Carbon::now()->subMinutes(1))->delete();
		//$deleteSaveProfile = SaveProfileEmployer::where('usa_company', 'Công ty GMC')->delete();

		//$this->info('Word of the Day sent to All Users');

		//\Log::info("Cron is working fine!");

		$reset_vip = Employer::whereDate('em_timevip', '<', Carbon::now()->toDateTimeString());
		$han_ho_so = DB::table('employer_profile')->whereDate('pr_expired_at', '<', Carbon::now()->toDateTimeString());
		$xoa_hs_nop = DB::table('user_applied')->whereDate('ap_expired_at', '<', Carbon::now()->toDateTimeString());
		$xoa_hs_luu = DB::table('user_saveprofile')->whereDate('usa_expired_at', '<', Carbon::now()->toDateTimeString());

		$a = Employer::where('em_vip', 0)->pluck('id');
		if ($a->isEmpty()) {
			$a = 0;
		}
		$han_vip = EmployerProfile::where('employer_profile.pr_employer_id', $a);
		//dd($han_vip);
		if ($reset_vip) {
			$a = $reset_vip->update(['em_vip' => 0]);
		}
		if ($han_ho_so) {
			$b = $han_ho_so->update(['pr_active' => 0]);
		}
		if ($xoa_hs_nop) {
			$c = $xoa_hs_nop->delete();
		}
		if ($xoa_hs_luu) {
			$d = $xoa_hs_luu->delete();
		}
		if ($han_vip) {
			$e = $han_vip->update(['pr_active' => 0]);
		}
		$this->info('Updated');
	}
}
