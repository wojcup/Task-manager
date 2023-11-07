<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) {
            $table->bigIncrements('task_id')->unsigned();
            $table->uuid( 'uuid' );
            $table->string('name');
            $table->longText('description');
            $table->integer('owner_id');
            $table->timestamp('created_at')->default( NULL );
            $table->timestamp('updated_at')->nullable()->default( NULL );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
