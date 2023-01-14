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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('dob');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });
          // Insert some stuff
          DB::table('users')->insert(
            array(
                'id' => '1',
                'first_name' => 'admin',
                'middle_name' => 'admin',
                'last_name' => 'admin',
                'gender' => 'admin',
                'phone_number' => '09751234567',
                'dob' => 'admin',
                'email' => 'admin@domain.com',
                'password' => bcrypt('recordsadmin'),
                'role' => 'ADMIN',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};