<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();;
            $table->string('account')->nullable();
            $table->integer('previous')->nullable();;
            $table->integer('newbu')->nullable();;
            $table->integer('technology')->nullable();;
            $table->integer('job_range')->nullable();;
            $table->string('language')->nullable();;
            $table->date('ob_day')->nullable();;
            $table->date('transfer_day')->nullable();;
            $table->integer('source')->nullable();;
            $table->integer('status')->nullable();;
            $table->string('forecast_customer_code')->nullable();;
            $table->integer('forecast_bu')->nullable();;
            $table->longText('note')->nullable();;
            $table->softDeletes ();
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
        Schema::dropIfExists('accounts');
    }
}
