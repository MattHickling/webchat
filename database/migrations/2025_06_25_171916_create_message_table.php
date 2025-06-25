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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->text('content');
            $table->string('type'); 
            $table->string('status')->default('sent'); 
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->string('media_url')->nullable(); 
            $table->string('media_type')->nullable(); 
            $table->string('reply_to_message_id')->nullable(); 
            $table->boolean('is_starred')->default(false); 
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
