<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Foreign key to events table
            $table->string('ticket_type')->nullable(); // Optional ticket type
            $table->integer('quantity')->default(1); // Number of tickets
            $table->string('payment_status')->default('pending'); // Payment status (pending, completed)
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}


