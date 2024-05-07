<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnythingTable extends Migration
{
    public function up(): void
    {
        Schema::create('anything', function (Blueprint $table) {
            $table->id();
            $table->string('label')->index();
            $table->string('slug')->index();
            $table->string('group')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('anything');
    }
}
