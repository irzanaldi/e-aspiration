<?php

use App\Models\Admin;
use App\Models\Level;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->integer('no_telp')->default(0);
            $table->unsignedTinyInteger('status')->default(1);
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->integer('point')->default(0);
            $table->foreignIdFor(Level::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Admin::class)->nullable()->constrained()->cascadeOnDelete();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
