<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUsernameFromUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable(); // Atau sesuai tipe kolom asalnya
        });
    }
}
