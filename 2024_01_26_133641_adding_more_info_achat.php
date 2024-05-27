<?php

use App\Models\Produit;
use App\Models\User;
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
        Schema::table('achats', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Produit::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('achats', function (Blueprint $table) {
            $table->dropForeignFor(User::class);
            $table->dropForeign(Produit::class);
        });
    }
};
