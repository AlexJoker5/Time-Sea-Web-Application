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
        Schema::create('watches', function (Blueprint $table) {
            $table->id();
            $table->string("serialName");
            $table->json("category");
            $table->boolean("featured")->default(false);
            $table->integer("price");
            $table->string("shortDescription");
            $table->text("image");
            $table->string("madeIn");
            $table->string("company");
            $table->date("releasedDate");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watches');
    }
};
