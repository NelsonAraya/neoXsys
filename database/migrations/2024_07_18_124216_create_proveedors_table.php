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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('dv',1);
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('contacto');
            $table->integer('telefono');
            $table->string('mail_pagos');
            $table->string('mail_contacto');
            $table->integer('banco_id')->unsigned();
            $table->foreign('banco_id')->references('id')->on('bancos');
            $table->integer('banco_cuenta_tipo_id')->unsigned();
            $table->foreign('banco_cuenta_tipo_id')->references('id')->on('banco_cuenta_tipos');
            $table->integer('numero_cuenta');
            $table->integer('retencion_extra')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
