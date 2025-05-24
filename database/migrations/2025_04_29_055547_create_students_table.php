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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('code',15);
            $table->string('phone',15);
            $table->string('email',100);
            $table->string('nameFather',60);
            $table->string('codeFather',60);
            $table->string('phoneFather',60);
            $table->string('nameMother',60);
            $table->string('codeMother',60);
            $table->string('phoneMother',60);
            $table->string('avatar',300);
            $table->string('address',60);
            $table->boolean('isActive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
