<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('mothername')->nullable();
            $table->datetime('birthday')->nullable();
            $table->string('profile')->nullable();
            $table->unsignedBigInteger('cpf')->nullable();
            $table->unsignedBigInteger('cns')->nullable();
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')
            ->references('id')
            ->on('address');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'))->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
};
