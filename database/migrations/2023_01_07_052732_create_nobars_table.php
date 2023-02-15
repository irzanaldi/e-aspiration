<?php

use App\Models\Admin;
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
    public function up()
    {
        Schema::create('nobars', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 20);
            $table->string('name', 100);
            $table->string('city', 100);
            $table->string('location', 100);
            $table->string('gmaps_latitude', 50);
            $table->string('gmaps_longtitude', 50);
            $table->date('date');
            $table->boolean('status')->default(true);
            $table->integer('price')->default(0);
            $table->text('description')->nullable();
            $table->time('time');
            $table->integer('id_tmdb');
            $table->foreignIdFor(Admin::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nobars');
    }
};
