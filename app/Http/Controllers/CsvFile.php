<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CsvExport;

class CsvFile extends Controller
{
    public function csv_export(){
        return Excel::download(new CsvExport,'reservation.xlsx');
    }
}
