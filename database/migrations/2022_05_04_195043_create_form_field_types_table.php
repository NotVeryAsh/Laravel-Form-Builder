<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFieldTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_field_types', function (Blueprint $table) {
            $table->id();
            $table->string('html_tag_name');
            $table->string('html_type')->nullable();
            $table->string('friendly_name');
            $table->string('slug');
            $table->integer('allow_multiple_options')->default(0);
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
        Schema::dropIfExists('form_field_types');
    }
}
