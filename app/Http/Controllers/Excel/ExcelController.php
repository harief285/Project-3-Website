<?php

namespace App\Http\Controllers\Excel;

use App\Exports\PatientHistoryExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function downloadRiwayat()
    {
        return Excel::download(new PatientHistoryExport, 'riwayat_pasien.xlsx');
    }
}
