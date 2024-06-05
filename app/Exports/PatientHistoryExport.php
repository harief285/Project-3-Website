<?php

namespace App\Exports;

use App\Models\Deteksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientHistoryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Deteksi::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Name',
            'Tekanan Darah',
            'Kolesterol',
            'Prediksi',
            'Presentase',
            'Gambar'
        ];
    }
}
