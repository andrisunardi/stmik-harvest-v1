<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $data = new Gallery();
        $data->category = 1;
        $data->name = "Image";
        $data->name_id = "Gambar";
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->tag = "Library";
        $data->tag_id = "Perpustakaan";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Gallery();
        $data->category = 2;
        $data->name = "Video";
        $data->name_id = "Video";
        $data->description = "Description Video";
        $data->description_id = "Deskripsi Video";
        $data->tag = "Book";
        $data->tag_id = "Buku";
        $data->image = Str::slug($data->name) . ".png";
        $data->video = Str::slug($data->name) . ".mp4";
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = "SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->name_id = "SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->description = "Description SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->description_id = "Deskripsi SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->tag = "Graduation";
        $data->tag_id = "Kelulusan";
        $data->image = Str::slug($data->name) . ".png";
        $data->youtube = "https://www.youtube.com/watch?v=DAwvESRyGjk";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8104";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8100";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8101";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8102";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8103";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8105";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8106";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8107";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8166";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8167";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8168";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8169";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8170";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8171";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8172";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "1D3A8173";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "381e2502-4a37-4a4c-ad15-3e9b381f1b34";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_093849";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_094032";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_095514";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_095714";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_095753";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_095824";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_095924";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "20150515_100009";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Drop Point";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "DSC_0368";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Globe";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "hits photo";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        // $data = new Gallery();
        // $data->category = 1;
        // $data->name = "HITS Update_75";
        // $data->name_id = $data->name;
        // $data->description = "Description Image";
        // $data->description_id = "Deskripsi Gambar";
        // $data->image = "{$data->name}.png";
        // $data->save();

        // $data = new Gallery();
        // $data->category = 1;
        // $data->name = "HITS Update_81 (1)";
        // $data->name_id = $data->name;
        // $data->description = "Description Image";
        // $data->description_id = "Deskripsi Gambar";
        // $data->image = "{$data->name}.png";
        // $data->save();

        // $data = new Gallery();
        // $data->category = 1;
        // $data->name = "HITS Update_81";
        // $data->name_id = $data->name;
        // $data->description = "Description Image";
        // $data->description_id = "Deskripsi Gambar";
        // $data->image = "{$data->name}.png";
        // $data->save();

        // $data = new Gallery();
        // $data->category = 1;
        // $data->name = "HITS Update_163";
        // $data->name_id = $data->name;
        // $data->description = "Description Image";
        // $data->description_id = "Deskripsi Gambar";
        // $data->image = "{$data->name}.png";
        // $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4107";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4108";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4111";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4112";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4113";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4114";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4115";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4118";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4123";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4124";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4125";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_4126";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_214654";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_214712";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_214829";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_214942";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_214958";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215015";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215123";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215136";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215435";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215529";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215602";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215641";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215658";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215716";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215736";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215754";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215827";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG_20210420_215845";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8370";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8371";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8372";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8378";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8379";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8381";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8382";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "IMG-8384";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Lobby";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "lorong perpustakaan";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "R85_9416a";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "rio";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Ruang Baca (untuk our profile)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "students HITS";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "vlcsnap-2014-11-19-16h46m57s124";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Waiting Room";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-09-10 at 12.13.05 AM (1)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-09-10 at 12.13.05 AM (2)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-09-10 at 12.13.05 AM (3)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-09-10 at 12.13.05 AM";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-02 at 10.22.20 AM";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-09 at 2.58.36 PM";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-09 at 2.58.37 PM (1)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-09 at 2.58.37 PM (2)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-11 at 4.08.37 PM (1)";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-11 at 4.08.37 PM";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "WhatsApp Image 2021-11-12 at 4.12.35 PM";
        $data->name_id = $data->name;
        $data->description = "Description Image";
        $data->description_id = "Deskripsi Gambar";
        $data->image = "{$data->name}.png";
        $data->save();
    }
}
