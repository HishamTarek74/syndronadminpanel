<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Console\Command;
use App\Models\AdPromotion;

class AddPromotionDown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ad_promotion:down';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'daily check promotion ads to down  if the end date expired';

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
        $promotionAds = AdPromotion::whereDate('end', '<', Carbon::now()->today()->toDateString())->get();

        foreach ($promotionAds as $promotionAd) {
            $ad = Ad::findOrFail($promotionAd->ad_id);
            // down promotion ads
            $ad->update(['type' => 'normal']);

        }

    }
}
