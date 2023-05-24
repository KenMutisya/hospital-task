<?php

use App\Models\Enums\AppointmentStatus;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class);
            $table->foreignIdFor(User::class)->nullable();
            $table->dateTime('appointment_date');
            $table->string('ticket_number');
            $table->string('department')->nullable();
            $table->string('status')->default(AppointmentStatus::PENDING->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
