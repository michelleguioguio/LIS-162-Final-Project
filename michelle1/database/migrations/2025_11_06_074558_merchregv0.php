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
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('user_type_name')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('user_type_id')
                  ->nullable()
                  ->constrained()
                  ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('merchandise_types', function (Blueprint $table) {
            $table->id();
            $table->string('merchandise_type_name')->unique()->nullable();
            $table->decimal('patong', 5, 2)->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('merchandise', function (Blueprint $table) {
            $table->id();
            $table->string('merch_code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 8, 2)->nullable()->default(0);
            $table->integer('stock')->nullable()->default(0);
            $table->string('status')->nullable()->default('available');
            $table->string('thumbnail')->nullable()->default('no-image.png');

            $table->foreignId('merchandise_type_id')
                  ->nullable()
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->nullable();
            $table->date('event_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('event_merchandise', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                  ->nullable()
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('merchandise_id')
                  ->nullable()
                  ->references('id')
                  ->on('merchandise')
                  ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_merchandise');
        Schema::dropIfExists('events');
        Schema::dropIfExists('merchandise');
        Schema::dropIfExists('merchandise_types');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('user_types');
    }
};
