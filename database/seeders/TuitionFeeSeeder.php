<?php

namespace Database\Seeders;

use App\Models\TuitionFee;
use Illuminate\Database\Seeder;

class TuitionFeeSeeder extends Seeder
{
    public function run()
    {
        $data = new TuitionFee();
        $data->name = 'Registration Fee (IDR)';
        $data->name_idn = 'Biaya Pendaftaran (iDR)';
        $data->description = '150 Ribu<br>Once Payment';
        $data->description_idn = '150 Ribu<br>Pembayaran Sekali';
        $data->save();

        $data = new TuitionFee();
        $data->name = 'Development Fee (IDR)';
        $data->name_idn = 'Biaya Pengembangan (IDR)';
        $data->description = '10 Juta<br>Once Payment';
        $data->description_idn = '10 Juta<br>Pembayaran sekali';
        $data->save();

        $data = new TuitionFee();
        $data->name = 'Tuition Fee (IDR)';
        $data->name_idn = 'Biaya Kuliah (IDR)';
        $data->description = '7 Juta<br>Per Semester (Including Semester Fees + Credit Fees)';
        $data->description_idn = '7 Juta<br>Per Semester (Termasuk Biaya Semester + Biaya SKS)';
        $data->save();
    }
}
