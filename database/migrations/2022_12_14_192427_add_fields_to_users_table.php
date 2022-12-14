<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('editor')->nullable();
            $table->string('profile_picture')->default('default.png')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('profile_picture');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
};
