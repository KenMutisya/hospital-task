<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        $labreports = Appointment::labappointments()->where('parent_id',$appointment->id)->get();

        $pdf=PDF::loadView('report.dashboard', [
                'appointment'=>$appointment->load('patient'),
                'labreports'=>$labreports,
        ]);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
