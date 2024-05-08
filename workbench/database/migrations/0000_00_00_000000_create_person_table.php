<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    public function up(): void
    {
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gender_id');
            $table->foreignId('race_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('person');
    }
}
