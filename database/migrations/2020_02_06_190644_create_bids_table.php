<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->text('company_name');
            $table->string('ntn_number')->unique();
            
            $table->text('experience');
            $table->text('amount');

            $table->text('contact_person');
            $table->text('email');
            $table->text('contact_no');
            $table->string('upload_file');
            $table->string('extension');
            $table->string('status')->default('pending')->nullable();

            $table->foreignId('tender_id')->constrained('tenders')->onDelete('cascade');

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('bids');
    }
}
