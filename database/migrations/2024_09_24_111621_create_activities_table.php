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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('activityTitle');
            $table->longText('activityDescription');
            $table->string('activityLocation');
            $table->date('activityDate');
            $table->integer('activityCapacity');
            $table->integer('activityCurrentParticipants')->default(0);
            $table->time('activityTime');
            $table->longText('activityRequirements');
            $table->string('activityImage');
            $table->string('activityStatus')->default('On Going');
            $table->string('activityCreator');
            $table->date('activityStartRegistration');
            $table->date('activityEndRegistration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
