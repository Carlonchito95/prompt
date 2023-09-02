<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('salons', function (Blueprint $table) {
        $table->decimal('latitude', 10, 7)->nullable();    // 10 dígitos en total, 7 después del punto decimal
        $table->decimal('longitude', 11, 7)->nullable();   // 11 dígitos en total, 7 después del punto decimal
        $table->float('radius')->nullable();               // Radio en metros (puedes ajustar según necesidad)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('salons', function (Blueprint $table) {
        $table->dropColumn('latitude');
        $table->dropColumn('longitude');
        $table->dropColumn('radius');
    });
}
};
