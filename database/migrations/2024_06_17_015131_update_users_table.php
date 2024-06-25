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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['name']); // Replace with actual column names you want to drop

            // Add new columns
            $table->string('username'); // Replace with actual new column definitions
            $table->string('firstname'); 
            $table->string('lastname');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('name'); // Use the appropriate type

            // Drop new columns
            $table->dropColumn(['username', 'firstname', 'lastname']);
        });
    }
};
