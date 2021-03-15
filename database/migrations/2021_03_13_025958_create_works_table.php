<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->string('edition');
            $table->longText('resume');
            $table->integer('pages');
            $table->string('img');
            $table->dateTime('ano');
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subject_id');



            // $table->foreign('category_id')
            // ->references('id')
            // ->on('categories')
            // ->onDelete('cascade');

            
            // $table->foreign('subject_id')
            // ->references('id')
            // ->on('subjects')
            // ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
