<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnythingableTable extends Migration
{
    public function up(): void
    {
        Schema::create('anythingable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anything_id');
            $table->foreignId('anythingable_id');
            $table->string('anythingable_type');
            $table->unique(['anything_id', 'anythingable_id', 'anythingable_type']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('anythingable');
    }
}
