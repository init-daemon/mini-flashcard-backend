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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("answer_id");
            
            $table->text("question");
            $table
                ->enum("type", MigrationConstant::QUESTION_TYPE)
                ->default(MigrationConstant::QUESTION_TYPE[0]);

            $table
                ->foreign("answer_id")
                ->references('id')
                ->on("answers")
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
        Schema::dropIfExists('questions');
    }
};
