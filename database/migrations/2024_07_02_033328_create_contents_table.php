<?php

use App\Constants\MigrationConstant;
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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id");
            $table->unsignedBigInteger("contenable_id");
            
            $table->string("contenable_type");
            $table->text("content");
            $table
                ->enum("type", MigrationConstant::CONTENTS["TYPE"])
                ->default(MigrationConstant::CONTENTS["TYPE"][0]);

            $table
                ->foreign("item_id")
                ->references('id')
                ->on("items")
                ->onDelete("cascade");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
