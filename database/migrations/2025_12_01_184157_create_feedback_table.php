<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('url')->index();
            $table->string('subject');
            $table->text('description');
            $table->foreignIdFor(\App\Models\User::class)->nullable()->index();
            $table->enum('status', \Farzoqe\Feedback\Models\Feedback::STATUSES)->default(\Farzoqe\Feedback\Models\Feedback::STATUSES[0])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
