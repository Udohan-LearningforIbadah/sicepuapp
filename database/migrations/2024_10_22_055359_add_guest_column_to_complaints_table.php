<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan make:migration add_guest_column_to_complaints_table --table=complaints #the command at terminal
     */
    public function up()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('guest_name')->after('image')->nullable();
            $table->string('guest_email')->after('guest_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('guest_name');
            $table->dropColumn('guest_email');
        });
    }
};
