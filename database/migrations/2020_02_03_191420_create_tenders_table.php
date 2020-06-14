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
            $table->id();
            $table->string('reference_no')->unique();
            $table->string('title');
            $table->date('open_date');
            $table->date('close_date');
            $table->text('description');

            $table->foreignId('tender_category_id')->constrained('tender_categories')->onDelete('cascade'); 

            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade'); 

            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade'); 

            $table->boolean('status')->default(1)->nullable();
            $table->string('accept_status')->default('pending')->nullable();
            
            $table->string('upload_file');
            $table->string('extension');

            $table->string('company_ntn');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone_no');
            $table->string('company_address');

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
