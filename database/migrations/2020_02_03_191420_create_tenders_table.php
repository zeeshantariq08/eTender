<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_no')->unique();
            $table->string('title');
            $table->date('open_date');
            $table->date('close_date');
            $table->text('description');
            $table->unsignedInteger('tender_category_id');
            $table->foreign('tender_category_id')
                ->references('id')
                ->on('tender_categories')->onDelete('cascade');

            $table->unsignedInteger('district_id');
            $table->unsignedInteger('province_id');
            $table->boolean('status')->default(1)->nullable();
            $table->string('accept_status')->default('pending')->nullable();
            $table->string('upload_file');
            $table->string('extension');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('tenders');
    }
}
