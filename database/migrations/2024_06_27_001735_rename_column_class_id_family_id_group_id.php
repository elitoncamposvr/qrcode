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
        Schema::table('codes', function (Blueprint $table) {
            $table->renameColumn('group_id', 'group_code');
            $table->renameColumn('family_id', 'families_code');
            $table->renameColumn('class_id', 'class_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->renameColumn('group_code', 'group_id');
            $table->renameColumn('families_code', 'family_id');
            $table->renameColumn('class_code', 'class_id');
        });
    }
};
