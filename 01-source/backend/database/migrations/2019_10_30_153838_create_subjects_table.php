<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subjectype_id')->nullable();
            $table->text('ask')->nullable();
            $table->text('askansA')->nullable();
            $table->text('askansB')->nullable();
            $table->text('askansC')->nullable();
            $table->text('askansD')->nullable();
            $table->string('ans')->nullable();
            $table->string('subhardtype')->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
