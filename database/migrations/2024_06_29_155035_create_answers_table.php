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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
           
            $table->text("answer");
            $table
                ->enum("type", MigrationConstant::ANSWER_TYPE)
                ->default(MigrationConstant::ANSWER_TYPE[0]);

            $table
                ->foreign("user_id")
                ->references('id')
                ->on("users")
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
        Schema::dropIfExists('answers');
    }
};
