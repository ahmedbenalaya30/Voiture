<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use DB;
use Carbon\Carbon;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cars1= DB::table('cars')->get();
        $today = Carbon::today()->format('Y-m-d');
        $notificationsInsurance=array();
        $notificationsTechnicalVisit=array();
        foreach($cars1 as $car)
        {
            if($car->insurance<$today)
            $notificationsInsurance[]="insurance expired".$car->insurance." for ".$car->carNumber."";
            if($car->insurance<$today)
            $notificationsTechnicalVisit[]="TechnicalVisit expired".$car->technicalVisit." for ".$car->carNumber."";
        }
        $nbNotif=  count($notificationsInsurance)+ count($notificationsTechnicalVisit);

    View::share('notificationsInsurance', $notificationsInsurance);
    View::share('notificationsTechnicalVisit',$notificationsTechnicalVisit);
    View::share('nbNotif',$nbNotif);

        Schema::defaultStringLength(100);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
