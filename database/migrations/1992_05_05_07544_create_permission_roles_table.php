<?php

use App\Models\PermissionRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            // $table->id();
            $table->primary(['role_id', 'permission_id']);
            $table->foreignId('role_id')->unsigned()->constrained('roles')->onDelete('cascade');
            $table->foreignId('permission_id')->unsigned()->constrained('permissions')->onDelete('cascade');
            $table->integer('_status')->default(PermissionRole::ACTIVE);
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
        Schema::dropIfExists('permission_role');
    }
}
