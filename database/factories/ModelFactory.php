<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'registred_ip' => $faker->ipv4,
        'last_ip' => $faker->ipv4,
        'password' => bcrypt('demo'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Hoteru\Page::class,function(Faker\Generator $faker){
	$t = $faker->sentence(2);
	return [
		'title'				=> $t,
		'slug'				=> str_slug($t,'-'),
		'content'			=> $faker->text(800),
		'meta_title'		=> $t,
		'meta_keywords' 	=> $faker->text(500),
		'meta_description'	=> $faker->text(160),
		'display_menu'	=> rand(0,1),
		'display_footer'	=> rand(0,1),
	];
});

$factory->define(Hoteru\Ip::class,function(Faker\Generator $faker){
	return [
		'ip'	=> $faker->ipv4
	];
});
