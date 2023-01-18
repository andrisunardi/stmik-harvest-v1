<?php

namespace App\Http\Livewire\CMS;

class SidebarComponent extends Component
{
    public function getSidebars()
    {
        return collect(
            [
                [
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Blog',
                    'name' => trans('index.blog'),
                    'slug' => 'blog',
                    'icon' => 'fas fa-newspaper fa-fw',
                    'url' => route("{$this->subDomain}.blog.index"),
                    'categories' => [
                        [
                            'roles' => 'Super User|Marketing',
                            'permissions' => 'Blog',
                            'name' => trans('index.blog'),
                            'slug' => 'blog',
                            'icon' => 'fas fa-newspaper fa-fw',
                            'url' => route("{$this->subDomain}.blog.index"),
                        ], [
                            'roles' => 'Super User|Marketing',
                            'permissions' => 'Blog Category',
                            'name' => trans('index.category'),
                            'slug' => 'category',
                            'icon' => 'fas fa-tags fa-fw',
                            'url' => route("{$this->subDomain}.blog.category.index"),
                        ],
                    ],
                ], [
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Event',
                    'name' => trans('index.event'),
                    'slug' => 'event',
                    'icon' => 'fas fa-newspaper fa-fw',
                    'url' => route("{$this->subDomain}.event.index"),
                    'categories' => [
                        [
                            'roles' => 'Super User|Marketing',
                            'permissions' => 'Event',
                            'name' => trans('index.event'),
                            'slug' => 'event',
                            'icon' => 'fas fa-newspaper fa-fw',
                            'url' => route("{$this->subDomain}.event.index"),
                        ], [
                            'roles' => 'Super User|Marketing',
                            'permissions' => 'Event Category',
                            'name' => trans('index.category'),
                            'slug' => 'category',
                            'icon' => 'fas fa-tags fa-fw',
                            'url' => route("{$this->subDomain}.event.category.index"),
                        ],
                    ],
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Admission Calendar',
                    'name' => trans('index.admission-calendar'),
                    'slug' => 'admission-calendar',
                    'icon' => 'fas fa-calendar fa-fw',
                    'url' => route("{$this->subDomain}.admission-calendar.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User',
                    'permissions' => 'Banner',
                    'name' => trans('index.banner'),
                    'slug' => 'banner',
                    'icon' => 'fas fa-images fa-fw',
                    'url' => route("{$this->subDomain}.banner.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Faq',
                    'name' => trans('index.faq'),
                    'slug' => 'faq',
                    'icon' => 'fas fa-question fa-fw',
                    'url' => route("{$this->subDomain}.faq.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Gallery',
                    'name' => trans('index.gallery'),
                    'slug' => 'gallery',
                    'icon' => 'fas fa-photo-film fa-fw',
                    'url' => route("{$this->subDomain}.gallery.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Network',
                    'name' => trans('index.network'),
                    'slug' => 'network',
                    'icon' => 'fas fa-sitemap fa-fw',
                    'url' => route("{$this->subDomain}.network.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Offer',
                    'name' => trans('index.offer'),
                    'slug' => 'offer',
                    'icon' => 'fas fa-gift fa-fw',
                    'url' => route("{$this->subDomain}.offer.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Procedure',
                    'name' => trans('index.procedure'),
                    'slug' => 'procedure',
                    'icon' => 'fas fa-list fa-fw',
                    'url' => route("{$this->subDomain}.procedure.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Slider',
                    'name' => trans('index.slider'),
                    'slug' => 'slider',
                    'icon' => 'fas fa-sliders-h fa-fw',
                    'url' => route("{$this->subDomain}.slider.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Testimony',
                    'name' => trans('index.testimony'),
                    'slug' => 'testimony',
                    'icon' => 'fas fa-comments fa-fw',
                    'url' => route("{$this->subDomain}.testimony.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Tuition Fee',
                    'name' => trans('index.tuition_fee'),
                    'slug' => 'tuition-fee',
                    'icon' => 'fas fa-money fa-fw',
                    'url' => route("{$this->subDomain}.tuition-fee.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User|Admin',
                    'permissions' => 'Value',
                    'name' => trans('index.value'),
                    'slug' => 'value',
                    'icon' => 'fas fa-trophy fa-fw',
                    'url' => route("{$this->subDomain}.value.index"),
                    'pages' => null,
                ], [
                    'category' => null,
                    'roles' => 'Super User',
                    'permissions' => 'Configuration',
                    'name' => trans('index.configuration'),
                    'slug' => 'configuration',
                    'icon' => 'fas fa-gears fa-fw',
                    'url' => route("{$this->subDomain}.configuration.index"),
                    'pages' => [
                        [
                            'roles' => 'Super User',
                            'permissions' => 'User',
                            'name' => trans('index.user'),
                            'slug' => 'user',
                            'icon' => 'fas fa-user fa-fw',
                            'url' => route("{$this->subDomain}.configuration.user.index"),
                            'categories' => null,
                        ], [
                            'roles' => 'Super User',
                            'permissions' => 'Activity',
                            'name' => trans('index.activity'),
                            'slug' => 'activity',
                            'icon' => 'fas fa-history fa-fw',
                            'url' => route("{$this->subDomain}.configuration.activity.index"),
                            'categories' => null,
                        ], [
                            'roles' => 'Super User',
                            'permissions' => 'Role',
                            'name' => trans('index.role'),
                            'slug' => 'role',
                            'icon' => 'fas fa-suitcase fa-fw',
                            'url' => route("{$this->subDomain}.configuration.role.index"),
                            'categories' => null,
                        ], [
                            'roles' => 'Super User',
                            'permissions' => 'Permission',
                            'name' => trans('index.permission'),
                            'slug' => 'permission',
                            'icon' => 'fas fa-key fa-fw',
                            'url' => route("{$this->subDomain}.configuration.permission.index"),
                            'categories' => null,
                        ], [
                            'roles' => 'Super User',
                            'permissions' => 'Setting',
                            'name' => trans('index.setting'),
                            'slug' => 'setting',
                            'icon' => 'fas fa-gear fa-fw',
                            'url' => route("{$this->subDomain}.configuration.setting.index"),
                            'categories' => null,
                        ],
                    ],
                ],
            ],
        );
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.layout.sidebar", [
            'sidebars' => $this->getSidebars(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
