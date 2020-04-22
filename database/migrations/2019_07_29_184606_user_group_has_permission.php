<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserGroupHasPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user_group', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_group_id');

            $table->foreign('user_group_id')->references('id')->on('user_groups')->onDelete('cascade');

            $table->unsignedInteger('permission_id');

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

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
        Schema::dropIfExists('permission_user_group');
    }
}
