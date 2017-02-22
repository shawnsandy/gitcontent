<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by LaravelMigration.spBundle
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateGistCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gist_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('gist_id', 100)->nullable();
            $table->string('tags', 255)->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gist_collections');
    }
}
