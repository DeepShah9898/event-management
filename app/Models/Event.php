<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Event extends Model
{
    // Specify the attributes that are mass assignable
    protected $fillable = [
        'title', 'description', 'date', 'venue', 'created_by', 'price', 'capacity'
    ];

    // Optionally, you can also define hidden attributes (e.g., if you don't want them visible when serializing the model)
    // protected $hidden = ['created_by'];

    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('venue');
            $table->unsignedBigInteger('created_by');
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('capacity')->nullable();
            $table->timestamps();
            
            // Foreign key to reference the user who created the event
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }
}


