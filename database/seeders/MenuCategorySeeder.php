<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    public function run()
    {
        $sort = 1;
        $sortCategory = 1;

        $data = new Menu();
        $data->name = 'User';
        $data->name_id = 'Pengguna';
        $data->icon = 'bi bi-person';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->name = 'Registration';
        $data->name_id = 'Pendaftaran';
        $data->icon = 'bi bi-pencil';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->name = 'Contact';
        $data->name_id = 'Kontak';
        $data->icon = 'bi bi-telephone';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->name = 'Newsletter';
        $data->name_id = 'Berlangganan';
        $data->icon = 'bi bi-envelope';
        $data->sort = $sort++;
        $data->save();

        // BLOG
        $data = new MenuCategory();
        $data->name = 'Blog';
        $data->name_id = 'Blog';
        $data->icon = 'bi bi-newspaper';
        $data->sort = $sortCategory++;
        $data->save();

        $menu_category = MenuCategory::find($data->id);

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Blog';
        $data->name_id = 'Blog';
        $data->icon = 'bi bi-newspaper';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Blog Category';
        $data->name_id = 'Kategori Blog';
        $data->icon = 'bi bi-tags';
        $data->sort = $sort++;
        $data->save();
        // BLOG

        // EVENT
        $data = new MenuCategory();
        $data->name = 'Event';
        $data->name_id = 'Event';
        $data->icon = 'bi bi-calendar';
        $data->sort = $sortCategory++;
        $data->save();

        $menu_category = MenuCategory::find($data->id);

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Event';
        $data->name_id = 'Event';
        $data->icon = 'bi bi-calendar';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Event Category';
        $data->name_id = 'Kategori Event';
        $data->icon = 'bi bi-tags';
        $data->sort = $sort++;
        $data->save();
        // EVENT

        // WEBSITE
        $data = new MenuCategory();
        $data->name = 'Website';
        $data->name_id = 'Website';
        $data->icon = 'bi bi-globe';
        $data->sort = $sortCategory++;
        $data->save();

        $menu_category = MenuCategory::find($data->id);

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Admission Calendar';
        $data->name_id = 'Kalender Akademis';
        $data->icon = 'bi bi-window';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Banner';
        $data->name_id = 'Sampul';
        $data->icon = 'bi bi-window';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Faq';
        $data->name_id = 'Tanya Jawab';
        $data->icon = 'bi bi-question-circle';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Gallery';
        $data->name_id = 'Galeri';
        $data->icon = 'bi bi-image';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Network';
        $data->name_id = 'Jaringan';
        $data->icon = 'bi bi-sitemap';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Offer';
        $data->name_id = 'Penawaran';
        $data->icon = 'bi bi-gift';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Procedure';
        $data->name_id = 'Prosedur';
        $data->icon = 'bi bi-card-checklist';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Slider';
        $data->name_id = 'Slider';
        $data->icon = 'bi bi-sliders';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Testimony';
        $data->name_id = 'Testimoni';
        $data->icon = 'bi bi-chat-text';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Tuition Fee';
        $data->name_id = 'Biaya Kuliah';
        $data->icon = 'bi bi-money';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Value';
        $data->name_id = 'Nilai';
        $data->icon = 'bi bi-star';
        $data->sort = $sort++;
        $data->save();
        // WEBSITE

        // CONFIGURATION
        $data = new MenuCategory();
        $data->name = 'Configuration';
        $data->name_id = 'Konfigurasi';
        $data->icon = 'bi bi-gear';
        $data->sort = $sortCategory++;
        $data->save();

        $menu_category = MenuCategory::find($data->id);

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Admin';
        $data->name_id = 'Admin';
        $data->icon = 'bi bi-people';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Access';
        $data->name_id = 'Akses';
        $data->icon = 'bi bi-key';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Menu';
        $data->name_id = 'Menu';
        $data->icon = 'bi bi-list';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Menu Category';
        $data->name_id = 'Kategori Menu';
        $data->icon = 'bi bi-tags';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Setting';
        $data->name_id = 'Pengaturan';
        $data->icon = 'bi bi-gear';
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->menu_category_id = $menu_category->id;
        $data->name = 'Log';
        $data->name_id = 'Riwayat';
        $data->icon = 'bi bi-clock-history';
        $data->sort = $sort++;
        $data->save();
        // CONFIGURATION
    }
}
