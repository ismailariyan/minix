<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');  
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   
            $table->text('body'); 
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
