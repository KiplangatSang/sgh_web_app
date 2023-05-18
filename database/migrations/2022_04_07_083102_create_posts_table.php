<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_id');
            $table->integer('postable_id');
            $table->string('postable_type');
            $table->string('post_category');
            $table->longText('post_title');
            $table->longText('post_subtitle');
            $table->longText('post_top_image')->nullable();
            $table->longText('post_body')->nullable();
            $table->boolean('post_verification')->nullable();
            $table->string('post_verified_by')->nullable();
            $table->string('post_date_published')->nullable();
            $table->boolean('post_regulation')->nullable();
            $table->boolean('post_publish_status')->default(false);
            $table->boolean('is_suspended')->default(false);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('posts');
    }
}
