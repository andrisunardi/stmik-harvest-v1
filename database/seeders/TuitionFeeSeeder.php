<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TuitionFee;

class TuitionFeeSeeder extends Seeder
{
    public function run()
    {
        $data = new TuitionFee();
        $data->name = "Registration Fee (IDR)";
        $data->name_id = "Biaya Pendaftaran (iDR)";
        $data->description = "150 Ribu<br>Once Payment";
        $data->description_id = "150 Ribu<br>Pembayaran Sekali";
        $data->save();

        $data = new TuitionFee();
        $data->name = "Development Fee (IDR)";
        $data->name_id = "Biaya Pengembangan (IDR)";
        $data->description = "10 Juta<br>Once Payment";
        $data->description_id = "10 Juta<br>Pembayaran sekali";
        $data->save();

        $data = new TuitionFee();
        $data->name = "Tuition Fee (IDR)";
        $data->name_id = "Biaya Kuliah (IDR)";
        $data->description = "7 Juta<br>Per Semester (Including Semester Fees + Credit Fees)";
        $data->description_id = "7 Juta<br>Per Semester (Termasuk Biaya Semester + Biaya SKS)";
        $data->save();
    }
}
