<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');

            $table->rememberToken();
            $table->timestamps();
        });

       $users =User::create(
           array(
           'name'=>'tariq',
           'email'=>'muh.t.995@gmail.com',
           'password'=>Hash::make('tariq112217'),
           'type'=>'admin',
           'varified'=>'true',

           )
           
         );
         $users->save();

         
       
        
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

}
