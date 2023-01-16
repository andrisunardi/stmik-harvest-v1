<?php

namespace Database\Seeders;

use App\Models\PriceList;
use Illuminate\Database\Seeder;

class PriceListSeeder extends Seeder
{
    public function run()
    {
        PriceList::create([
            'name' => 'Personal Blog + CMS ± 2 Weeks',
            'name_id' => 'Blog Pribadi + CMS ± 2 Minggu',
            'description' => 'Web Blogging, there are titles, descriptions, pictures, videos, and so on',
            'description_id' => 'Web Blogging, terdapat judul, deskripsi, gambar, video, dan sebagainya',
            'price' => 'Rp. 2.000.000 Free Domain and Hosting',
            'price_id' => 'Rp. 2.000.000 Gratis Domain dan Hosting',
            'active' => true,
        ]);

        PriceList::create([
            'name' => 'Company Profile + CMS ± 4 Minggu',
            'name_id' => 'Profil Perusahaan + CMS ± 4 Minggu',
            'description' => 'Web tentang perusahaan, sejarah perusahaan, visi dan misi perusahaan, produk/jasa yang dikerjakan, galeri perusahaan, dan kontak perusahaan',
            'description_id' => 'Web about company, company history, company vision and mission, products / services performed, company gallery, and company contacts',
            'price' => 'Rp. 3.000.000 Free Domain and Hosting',
            'price_id' => 'Rp. 3.000.000 Gratis Domain dan Hosting',
            'active' => true,
        ]);

        PriceList::create([
            'name' => 'Online Store + CMS ± 8 Weeks',
            'name_id' => 'Toko Online + CMS ± 8 Minggu',
            'description' => 'A web that displays shop or company information and only displays a lot of products for sale',
            'description_id' => 'Web yang menampilkan informasi toko atau perusahaan dan hanya menampilkan banyak produk-produk yang dijual',
            'price' => 'Rp. 5.000.000 Free Domain and Hosting',
            'price_id' => 'Rp. 5.000.000 Gratis Domain dan Hosting',
            'active' => true,
        ]);

        PriceList::create([
            'name' => 'E-Commerce + CMS ± 12 Weeks',
            'name_id' => 'E-Commerce + CMS ± 12 Minggu',
            'description' => 'Web that displays products sold and can be purchased from cart to invoice until payment via payment confirmation (JNE and Payment Confirmation)',
            'description_id' => 'Web yang menampilkan produk yang dijual dan dapat dibeli dari keranjang ke invoice sampai pembayaran melalui konfirmasi pembayaran (JNE dan Konfirmasi Pembayaran)',
            'price' => 'Rp. 10.000.000 Free Domain and Hosting',
            'price_id' => 'Rp. 10.000.000 Gratis Domain dan Hosting',
            'active' => true,
        ]);

        PriceList::create([
            'name' => 'Web System',
            'name_id' => 'Sistem Web',
            'description' => 'Anda dapat memberikan kami konsep, maka kami akan mengerjakan sesuai konsep atau permintaan anda',
            'description_id' => 'You can give us a concept, then we will work on your concept or request',
            'price' => 'Contact Us',
            'price_id' => 'Hubungi Kami',
            'active' => true,
        ]);

        PriceList::create([
            'name' => 'Extend Domain and Hosting',
            'name_id' => 'Perpanjang Domain dan Hosting',
            'description' => 'After the 2nd year the website is created, an extension fee will be charged so that the website does not expire',
            'description_id' => 'Setelah tahun ke 2 website dibuat, maka akan dikenakan biaya perpanjang agar tidak expired websitenya',
            'price' => 'Rp. 1.000.000 / years',
            'price_id' => 'Rp. 1.000.000 / tahun',
            'active' => true,
        ]);
    }
}
