<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MenuCategory;
use App\Models\Menu;

class MenuCategorySeeder extends Seeder
{
    public function run()
    {
        $sort = 1;
        $sortCategory = 1;

        $data = new Menu();
        $data->name = "Registration";
        $data->name_id = "Pendaftaran";
        $data->icon = "bi bi-pencil";
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->name = "User";
        $data->name_id = "Pengguna";
        $data->icon = "bi bi-person";
        $data->sort = $sort++;
        $data->save();

        $data = new Menu();
        $data->name = "Contact";
        $data->name_id = "Kontak";
        $data->icon = "bi bi-telephone";
        $data->sort = $sort++;
        $data->save();

        // REPOSITORY
            $data = new MenuCategory();
            $data->name = "Repository";
            $data->name_id = "Repository";
            $data->icon = "bi bi-journal-text";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Repository";
            $data->name_id = "Repository";
            $data->icon = "bi bi-journal-text";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Repository File";
            $data->name_id = "Dokumen Repository";
            $data->icon = "bi bi-file-pdf";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Repository Contributor";
            $data->name_id = "Kontributor Repository";
            $data->icon = "bi bi-people-fill";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Repository Subject";
            $data->name_id = "Subyek Repository";
            $data->icon = "bi bi-tags";
            $data->sort = $sort++;
            $data->save();
        // REPOSITORY

        // STUDY PROGRAM
            $data = new MenuCategory();
            $data->name = "Study Program";
            $data->name_id = "Program Studi";
            $data->icon = "bi bi-book-half";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Study Program";
            $data->name_id = "Program Studi";
            $data->icon = "bi bi-book-half";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Study Program Category";
            $data->name_id = "Kategori Program Studi";
            $data->icon = "bi bi-tags";
            $data->sort = $sort++;
            $data->save();
        // STUDY PROGRAM

        // COURSE
            $data = new MenuCategory();
            $data->name = "Course";
            $data->name_id = "Mata Kuliah";
            $data->icon = "bi bi-book";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Course";
            $data->name_id = "Mata Kuliah";
            $data->icon = "bi bi-book";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Course Lecturer";
            $data->name_id = "Mata Kuliah Dosen";
            $data->icon = "bi bi-book-fill";
            $data->sort = $sort++;
            $data->save();
        // COURSE

        // LECTURER
            $data = new MenuCategory();
            $data->name = "Lecturer";
            $data->name_id = "Dosen";
            $data->icon = "bi bi-person-badge";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Lecturer";
            $data->name_id = "Dosen";
            $data->icon = "bi bi-person-badge";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Lecturer Education";
            $data->name_id = "Edukasi Dosen";
            $data->icon = "bi bi-bank";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Lecturer Work Experience";
            $data->name_id = "Pengalaman Kerja Dosen";
            $data->icon = "bi bi-briefcase";
            $data->sort = $sort++;
            $data->save();
        // LECTURER

        // NEWS
            $data = new MenuCategory();
            $data->name = "News";
            $data->name_id = "Berita";
            $data->icon = "bi bi-newspaper";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "News";
            $data->name_id = "Berita";
            $data->icon = "bi bi-newspaper";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "News Category";
            $data->name_id = "Kategori Berita";
            $data->icon = "bi bi-tags";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "News Comment";
            $data->name_id = "Komentar Berita";
            $data->icon = "bi bi-chat-text";
            $data->sort = $sort++;
            $data->save();
        // NEWS

        // FAQ
            $data = new MenuCategory();
            $data->name = "Faq";
            $data->name_id = "Tanya Jawab";
            $data->icon = "bi bi-question-circle";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Faq";
            $data->name_id = "Tanya Jawab";
            $data->icon = "bi bi-question-circle";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Faq Category";
            $data->name_id = "Kategori Tanya Jawab";
            $data->icon = "bi bi-tags";
            $data->sort = $sort++;
            $data->save();
        // FAQ

        // WEBSITE
            $data = new MenuCategory();
            $data->name = "Website";
            $data->name_id = "Website";
            $data->icon = "bi bi-globe";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Admission Calendar";
            $data->name_id = "Kalender Akademis";
            $data->icon = "bi bi-window";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Banner";
            $data->name_id = "Sampul";
            $data->icon = "bi bi-window";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Gallery";
            $data->name_id = "Galeri";
            $data->icon = "bi bi-image";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Magazine";
            $data->name_id = "Majalah";
            $data->icon = "bi bi-file";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Network";
            $data->name_id = "Jaringan";
            $data->icon = "bi bi-sitemap";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Procedure";
            $data->name_id = "Prosedur";
            $data->icon = "bi bi-legal";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Slider";
            $data->name_id = "Slider";
            $data->icon = "bi bi-sliders";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Testimony";
            $data->name_id = "Testimoni";
            $data->icon = "bi bi-chat-text";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Tuition Fee";
            $data->name_id = "Biaya Kuliah";
            $data->icon = "bi bi-money";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Value";
            $data->name_id = "Nilai";
            $data->icon = "bi bi-star";
            $data->sort = $sort++;
            $data->save();
        // WEBSITE

        // CONFIGURATION
            $data = new MenuCategory();
            $data->name = "Configuration";
            $data->name_id = "Konfigurasi";
            $data->icon = "bi bi-gear";
            $data->sort = $sortCategory++;
            $data->save();

            $menu_category = MenuCategory::find($data->id);

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Admin";
            $data->name_id = "Admin";
            $data->icon = "bi bi-people";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Access";
            $data->name_id = "Akses";
            $data->icon = "bi bi-key";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Menu";
            $data->name_id = "Menu";
            $data->icon = "bi bi-list";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Menu Category";
            $data->name_id = "Kategori Menu";
            $data->icon = "bi bi-tags";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Setting";
            $data->name_id = "Pengaturan";
            $data->icon = "bi bi-gear";
            $data->sort = $sort++;
            $data->save();

            $data = new Menu();
            $data->menu_category_id = $menu_category->id;
            $data->name = "Log";
            $data->name_id = "Riwayat";
            $data->icon = "bi bi-clock-history";
            $data->sort = $sort++;
            $data->save();
        // CONFIGURATION
    }
}
