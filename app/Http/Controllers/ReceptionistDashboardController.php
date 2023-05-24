<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class ReceptionistDashboardController extends Controller
{
    public function __invoke()
    {
        $patients = Patient::latest()->paginate();
        return view('receptionist.dashboard',[
                'patients' => $patients
        ]);
    }
}
