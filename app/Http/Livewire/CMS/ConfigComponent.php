<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class ConfigComponent extends Component
{
    public $menu_name = 'Config';

    public $menu_icon = 'bi bi-tools';

    public $menu_slug = 'config';

    public $menu_table = 'setting';

    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        Config::set('app.locale', $locale);
        Session::put('locale', $locale);
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index")
            ->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
