<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
    	'avatar' => str_random(1), 
    	'first_name' => str_random(255),
    	'last_name' =>str_random(255), 
    	'address' =>str_random(255), 
    	'city'=>str_random(255), 
    	'zip'=>str_random(255), 
    	'county'=>str_random(255), 
    	'email'=>str_random(255), 
    	'phone'=>str_random(255), 
    	'note'=>str_random(255), 
    	'groups_id'=>str_random(1),
    ];
});
