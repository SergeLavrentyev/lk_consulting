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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ext_id');
            $table->string('content_type');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('manager_id')->constrained('users');
            $table->foreignId('program_id')->constrained();
            $table->string('order_num');
            $table->string('status');
            $table->string('total')->nullable();
            $table->string('last_comment')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
