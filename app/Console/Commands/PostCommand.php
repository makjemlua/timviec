<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PostCommand extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'status:delete';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Delete Save Profile';

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
	}
}
