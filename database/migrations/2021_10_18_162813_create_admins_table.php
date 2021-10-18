<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->unsigned();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();

            $table->string('role');
            $table->string('status')->default('Active');
            $table->string('profile_image')->default('profile_image_icon.png');

            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });

        \App\Models\Admin::create([  'name' => 'Hamza Saqib',
                        'email' => 'admin@gmail.com',
                        'role' => 'Super Admin',
                        'phone' => '03239991999',
                        'profile_image' => 'admin_profile.jpg',
                        'password' => Hash::make('admin123')]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
