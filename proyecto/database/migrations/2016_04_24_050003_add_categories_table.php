<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre', 100);
            $table->text('Descripcion');
            $table->timestamps();
        });
        
        // Alteramos y agregamos relación con la tabla Blog
        Schema::table('blog', function ($table) {
            // Crea el campo
            $table->integer('categoria_id')
                  ->unsigned()
                  ->nullable();
            
            // Agrega la relación
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog', function ($table) {
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
        });
        
        Schema::drop('categoria');
    }
}
