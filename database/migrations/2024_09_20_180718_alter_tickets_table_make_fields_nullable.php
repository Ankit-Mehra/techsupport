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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('priority_id')->nullable()->change();
            $table->foreignId('status_id')->nullable()->change();
            $table->foreignId('agent_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('priority_id')->nullable(false)->change();
            $table->foreignId('status_id')->nullable(false)->change();
            $table->foreignId('agent_id')->nullable(false)->change();
        });
    }
};
