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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            // constrained recognize table user and column id from this table
            // nameOfTabel_nameOfCoulmn
            // onDelete('cascade') - if user is deleted, his every listing also will be deleted
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            // ->nullable() means it can be null and that is fine
            $table->string('logo')->nullable();
            $table->string('tags');
            $table->string('company');
            $table->string('location');
            $table->string('email');
            $table->string('website')->default('www.404.com');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
