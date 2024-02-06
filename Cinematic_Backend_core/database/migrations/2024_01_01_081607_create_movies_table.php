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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('original_name')->comment('Tên gốc');
            $table->string('vietnamese_name')->comment('Tên tiếng Việt');
            $table->integer('id_image');
            $table->text('description');
            $table->double('rating');
            $table->integer('id_contries');
            $table->integer('id_author')->comment('Đạo diễn');
            $table->integer('id_user_upload')->default(1);
            $table->integer('id_language_original');
            $table->date('date')->comment('Ngày phát hành');
            $table->integer('views')->default(0)->comment('Lượt xem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
