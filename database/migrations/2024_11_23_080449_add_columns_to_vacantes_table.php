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
        Schema::table('vacantes', function (Blueprint $table) {

            $table->string('titulo');
            $table->foreignId('costo_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('tema');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign(['vacantes_costo_id_foreign']);
            $table->dropForeign(['vacantes_categoria_id_foreign']);
            $table->dropForeign(['vacantes_user_id_foreign']);

            $table->dropColum(['costo_id','categoria_id','tema','ultimo_dia','descripcion','imagen','publicado','user_id']);
        });
    }
};
