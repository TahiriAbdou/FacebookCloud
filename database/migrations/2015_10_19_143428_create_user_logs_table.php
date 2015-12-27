<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserLogsTable extends Migration {

	public function up()
	{
		Schema::create('user_logs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('ip', 15);
			$table->string('country')->default('N/A');
			$table->string('browser');
			$table->string('user_agent');
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('user_logs');
	}
}