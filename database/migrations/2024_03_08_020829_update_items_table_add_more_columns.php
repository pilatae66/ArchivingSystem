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
        Schema::table('items', function (Blueprint $table) {
            $table->string('department', 255)->after('img_url')->default(NULL);
            $table->string('end_user', 255)->after('department')->default(NULL);
            $table->string('requestor', 255)->after('end_user')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn([
                'department',
                'end_user',
               'requestor',
            ]);
        });
    }
};
