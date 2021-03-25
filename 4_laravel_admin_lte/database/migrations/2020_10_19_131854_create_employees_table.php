<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name', 256);
            $table->string('phone');
            $table->string('email')->unique();
            $table->float('salary', 6, 3);
            $table->date('date');

            $table->foreignId('head_id')->nullable()->constrained('employees')->onDelete('SET NULL');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->foreignId('admin_created_id')->nullable()->constrained('users')->onDelete('SET NULL');
            $table->foreignId('admin_updated_id')->nullable()->constrained('users')->onDelete('SET NULL');

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
        Schema::dropIfExists('employees');
    }
}
