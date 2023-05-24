<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('receptionist.patient.create');
    }

    public function store(PatientRequest $request, Patient $patient)
    {
        $patient->create($request->validated());

        return redirect()->route('receptionist.dashboard');
    }

    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }

    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());

        return new PatientResource($patient);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return response()->json();
    }
}
