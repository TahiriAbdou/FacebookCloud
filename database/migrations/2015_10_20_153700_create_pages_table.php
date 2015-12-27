<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('slug')->index();
			$table->string('title', 100);
			$table->text('content');
			$table->string('meta_title', 255);
			$table->string('meta_keywords', 500);
			$table->string('meta_description', 160);
			$table->tinyInteger('display_menu')->default(false);
			$table->tinyInteger('display_footer')->default(false);
			$table->unique('slug');
		});
	}

	public function down()
	{
		Schema::drop('pages');
	}
}