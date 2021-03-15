<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('img_link');
            $table->string('video');
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');





        });

        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');

            $table->unique(['course_id', 'user_id']);

            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }
/** Nome 
 *  ● Descrição  
 * ● Slug  
 * ● Link da imagem  
 * ● Vídeo  
 * ● Categoria  */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
