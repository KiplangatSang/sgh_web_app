<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('external_posts_a_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("apiable_id");
            $table->string("apiable_type");
            $table->string("name");
            $table->longText("url");
            $table->string("call_type");
            $table->longText("description");
            $table->longText("params")->nullable();
            $table->string("source")->nullable();
            $table->boolean("is_callable")->default(true);
            $table->boolean("status")->default(false);
            $table->boolean("is_suspended")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_posts_a_p_i_s');
    }
};
