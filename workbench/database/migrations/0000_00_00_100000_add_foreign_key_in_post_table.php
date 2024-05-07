<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInPostTable extends Migration
{
    public function up(): void
    {
        Schema::table('post', function (Blueprint $table) {
            $table->foreign(['category_id'])->references(['id'])->on('category');
        });
    }

    public function down(): void
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
}
