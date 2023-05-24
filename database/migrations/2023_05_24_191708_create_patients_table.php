<?php

use App\Models\Enums\PatientStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->dateTime('date_of_birth')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default(PatientStatus::Active->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
