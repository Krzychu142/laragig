<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// to generate migrations: php artisan make:migration create_listings_table

// to redo migrate php artisan migrate:refresh - rolling back
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // ->nullable() means it can be null and that is fine
            $table->string('logo')->nullable();
            $table->string('tags');
            $table->string('company');
            $table->string('location');
            $table->string('email');
            // default value if it is empty
            // remember to rerun migration to process changes
            $table->string('website')->default('www.404.com');
            $table->longText('description'); // longText allows more text than string
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


// run the php artisan migrate command it's gonna run all the migrations from folder
