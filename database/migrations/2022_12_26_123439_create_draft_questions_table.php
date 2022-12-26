<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('tags')->nullable();
            $table->integer('review')->default(0);
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
        Schema::dropIfExists('draft_questions');
    }
};
