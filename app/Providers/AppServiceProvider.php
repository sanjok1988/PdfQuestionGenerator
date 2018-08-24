<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /*
         * init variables
         * for handling error when no option exists in database
         * all the variable used in blade as option name must be include here to handle error
         */
        view()->share([
            // 'publishedScheduleItem'=>$publishedScheduleItem = null,
            // 'footerAboutUs'=>null
            

        ]);


  

        /*
         * fetch all options from database
         * used in blade
         */

        // $option = Option::select('option_name','option_value')->get();

        // foreach($option as $value){
        //   view()->share($value->option_name, $value->option_value);

        // }




    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      if ($this->app->environment() !== 'production') {
       
      }

    }
}
