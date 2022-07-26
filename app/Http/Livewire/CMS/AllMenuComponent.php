<?php

namespace App\Http\Livewire\CMS;

class AllMenuComponent extends Component
{
    public $menu_name = 'All Menu';

    public $menu_icon = 'bi bi-collection';

    public $menu_slug = 'all-menu';

    public $menu_table = 'menu';

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index")
            ->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
