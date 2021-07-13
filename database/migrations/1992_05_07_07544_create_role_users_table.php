<?php

use App\Models\RoleUser;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            // $table->id();
            $table->primary(['user_id', 'role_id']);
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->foreignId('role_id')->unsigned()->constrained('roles')->onDelete('cascade');
            $table->integer('_status')->default(RoleUser::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
