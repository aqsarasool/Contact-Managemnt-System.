<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_create_contacts_table.php
public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->text('address');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('contacts');
}

};
