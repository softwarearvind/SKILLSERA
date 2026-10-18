<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->string('gst_number')->nullable()->after('address');
            $table->string('gst_registered_name')->nullable()->after('gst_number');
            $table->text('gst_address')->nullable()->after('gst_registered_name');
        });
    }

    public function down(): void
    {
        Schema::table('website_settings', function (Blueprint $table) {
            $table->dropColumn([
                'gst_number',
                'gst_registered_name',
                'gst_address',
            ]);
        });
    }
};
