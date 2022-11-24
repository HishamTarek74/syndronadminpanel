<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use App\Models\AccountPromotion;

class AccountPromotionDown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account_promotion:down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'daily check accounts package to down promotion if the end date expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $accountsDown = AccountPromotion::whereDate('end', '<', Carbon::now()->today()->toDateString())->get();

        foreach ($accountsDown as $account) {
            $user = User::findOrFail($account->user_id);
            $user->update(['type' => 'customer']);
            // down also account ads
            foreach ($user->specialAndVipAds as $ad) {
                $ad->update(['type' => 'normal']);
            }
            //$account->delete();
        }

    }
}
