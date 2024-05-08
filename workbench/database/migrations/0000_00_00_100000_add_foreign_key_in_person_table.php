<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInPersonTable extends Migration
{
    public function up(): void
    {
        Schema::table('person', function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('anything');
            $table->foreign('race_id')->references('id')->on('anything');
        });
    }

    public function down(): void
    {
        Schema::table('person', function (Blueprint $table) {
            $table->dropForeign(['gender_id']);
            $table->dropForeign(['race_id']);
        });
    }
}
