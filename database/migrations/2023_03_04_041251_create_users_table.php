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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id'); //in Primary Key
            $table->string('name', 50);
            $table->date('dob');
            $table->boolean('status')->default(1)->comment('1:Active, 0:Inactive');
            $table->timestamps(); // createdAT & UpdatedAT
        });
    }

    /**
     * Reverse the migrations.  
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
