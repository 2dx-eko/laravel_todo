<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id',20);
            $table->string('title',255)->default(0)->nullable()->change();
            $table->text('detail');
            $table->tinyInteger('status',4)->default(0);
            $table->dateTime('completed_at')->nullable()->change();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
