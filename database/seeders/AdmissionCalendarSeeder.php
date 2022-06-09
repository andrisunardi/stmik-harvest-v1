<?php

namespace Database\Seeders;

use App\Models\AdmissionCalendar;
use Illuminate\Database\Seeder;

class AdmissionCalendarSeeder extends Seeder
{
    public function run()
    {
        $data = new AdmissionCalendar();
        $data->name = "Wave I";
        $data->name_id = "Gelombang I";
        $data->description = "Deadline Until November 30, 2017. The first batch will be opened on November 30, 2017. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 30 November 2017. Gelombang I akan dibuka pada tanggal 30 November 2017. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->save();
        $data->date = "2017-11-30";

        $data = new AdmissionCalendar();
        $data->name = "Wave II";
        $data->name_id = "Gelombang II";
        $data->description = "Deadline Until February 28, 2018. The second batch will be opened on February 28, 2018. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 28 Februari 2018. Gelombang II akan dibuka pada tanggal 28 Februari 2018. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2019-02-28";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave III";
        $data->name_id = "Gelombang III";
        $data->description = "Deadline Until May 31, 2018. The third batch will be opened on May 31, 2018. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 31 Mei 2018. Gelombang III akan dibuka pada tanggal 31 Mei 2018. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2019-05-31";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave IV";
        $data->name_id = "Gelombang IV";
        $data->description = "Deadline Until August 31, 2018. The fourth batch will be opened on August 31, 2018. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 31 Agustus 2018. Gelombang IV akan dibuka pada tanggal 31 Agustus 2018. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2019-08-31";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave II A";
        $data->name_id = "Gelombang II A";
        $data->description = "Deadline Until February 28, 2019. The second batch will be opened on February 28, 2019. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 28 February 2019. Gelombang II akan dibuka pada tanggal 28 Februari 2019. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2019-02-28";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave III A";
        $data->name_id = "Gelombang III A";
        $data->description = "Deadline Until May 31, 2019. The third batch will be opened on May 31, 2019. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 31 Mei 2019. Gelombang III akan dibuka pada tanggal 31 Mei 2019. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2019-05-31";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave IV A";
        $data->name_id = "Gelombang IV A";
        $data->description = "Deadline Until August 31, 2017. The fourth batch will be opened on August 31, 2019. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 31 Agustus 2017. Gelombang IV akan dibuka pada tanggal 31 Agustus 2019. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2019-08-31";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave V";
        $data->name_id = "Gelombang V";
        $data->description = "Deadline Until May 31, 2022. The fifth batch will be opened on May 31, 2022. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Batas Waktu Hingga 31 Mei 2022. Gelombang V akan dibuka pada tanggal 31 Mei 2022. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->date = "2022-05-31";
        $data->save();
    }
}
