<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('post_author_id')->constrained('users')->onDelete('cascade');
      $table->string("post_title");
      $table->string("post_url");
      $table->string("post_description");
      $table->text("post_content");
      $table->enum("post_status", ["populer", "standart", "hot news"])->default("standart");
      $table->string('main_categories')->nullable();
      $table->string('sub_categories')->nullable();
      $table->string('more')->nullable();
      $table->string('post_image')->nullable();

      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('posts');
  }
};