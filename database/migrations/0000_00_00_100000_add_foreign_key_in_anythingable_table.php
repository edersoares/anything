<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInAnythingableTable extends Migration
{
    public function up(): void
    {
        Schema::table('anythingable', function (Blueprint $table) {
            $table->foreign('anything_id')->references('id')->on('anything');
        });
    }

    public function down(): void
    {
        Schema::table('anythingable', function (Blueprint $table) {
            $table->dropForeign(['anything_id']);
        });
    }
}
