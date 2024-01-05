<?php

namespace App\Exports;

use App\Models\Late;
use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use Maatwebsite\Excel\Concerns\FromCollection;

class LateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   
        $late = Late::with('student')->get()->map(function ($late) {
            return collect([
                // tambahkan field lainnya yang Anda butuhkan di sini
                'student_nis' => $late->student->nis,
                'student_name' => $late->student->name,
                'rombel_name' => $late->student->rombel->rombel,
                'rayon_name' => $late->student->rayon->rayon,
            ]);
        });

        // Menghitung total data duplikat
        $counts = $late->countBy(function ($item) {
            return $item['student_name'];
        });

        // Menghapus data duplikat
        $late = $late->unique('student_name');

        // Menambahkan total ke setiap item
        $late = $late->map(function ($item) use ($counts) {
            return $item->put('total', $counts[$item['student_name']]);
        });

        $late->prepend([
            'NIS',
            'Nama',
            'Rombel',
            'Rayon',
            'Total',
        ]);
    

        return $late;
    }
}



