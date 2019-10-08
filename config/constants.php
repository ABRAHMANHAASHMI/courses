<?php

class Constants
{

    public static function routes()
    {
      return [
            'main' => 'HomeController@main',
            'pricing_plan' => 'PricingController@pricing_plan',
            'training_room' => 'TrainingController@index',
            'profile' => 'ProfileController@index',
            'reset_password' => 'HomeController@reset_password',
            'change_plan' => 'PricingController@change_plan',
            'home' => 'HomeController@index',
            'contact' => 'HomeController@contact',
            'about_us' => 'HomeController@about_us',
            'faq' => 'HomeController@faq'
        ];
    }


}