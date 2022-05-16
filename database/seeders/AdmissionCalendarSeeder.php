<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\AdmissionCalendar;

class AdmissionCalendarSeeder extends Seeder
{
    public function run()
    {
        $data = new AdmissionCalendar();
        $data->name = "Wave I";
        $data->name_id = "Gelombang I";
        $data->description = "The first batch will be opened on November 30, 2017. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Gelombang I akan dibuka pada tanggal 30 November 2017. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave II";
        $data->name_id = "Gelombang II";
        $data->description = "The second batch will be opened on February 28, 2018. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Gelombang II akan dibuka pada tanggal 28 Februari 2018. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave III";
        $data->name_id = "Gelombang III";
        $data->description = "The third batch will be opened on May 31, 2018. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Gelombang III akan dibuka pada tanggal 31 Mei 2018. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->save();

        $data = new AdmissionCalendar();
        $data->name = "Wave IV";
        $data->name_id = "Gelombang IV";
        $data->description = "The fourth batch will be opened on August 31, 2018. Please take note and don't miss it, register yourself immediately.";
        $data->description_id = "Gelombang IV akan dibuka pada tanggal 31 Agustus 2018. Mohon untuk dicatat dan jangan sampai terlewatkan, Segera daftarkan diri anda.";
        $data->save();
    }
}
