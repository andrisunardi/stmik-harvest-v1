<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class SettingComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Setting';

    public $menu_icon = 'bi bi-gear';

    public $menu_slug = 'setting';

    public $menu_table = 'setting';

    public $menu_type = 'index';

    public $page = 1;

    public $per_page = 10;

    public $order_by = 'id';

    public $sort_by = 'desc';

    public $start_created_at;

    public $end_created_at;

    public $start_updated_at;

    public $end_updated_at;

    public $start_deleted_at;

    public $end_deleted_at;

    public $created_by_id = '';

    public $updated_by_id = '';

    public $deleted_by_id = '';

    public $active = '';

    public $row;

    public $checkbox_all;

    public $checkbox_id;

    public $setting;

    public $sms;

    public $call;

    public $fax;

    public $whatsapp;

    public $email;

    public $address;

    public $google_maps;

    public $google_maps_iframe;

    public $about_us;

    public $about_us_id;

    public $vision;

    public $vision_id;

    public $mission;

    public $mission_id;

    public $history;

    public $history_id;

    public $queryString = [
        'menu_type' => ['except' => 'index'],
        'page' => ['except' => 1],
        'per_page' => ['except' => 10],
        'order_by' => ['except' => 'id'],
        'sort_by' => ['except' => 'desc'],
        'created_by_id' => ['except' => ''],
        'updated_by_id' => ['except' => ''],
        'deleted_by_id' => ['except' => ''],
        'start_created_at' => ['except' => ''],
        'end_created_at' => ['except' => ''],
        'start_updated_at' => ['except' => ''],
        'end_updated_at' => ['except' => ''],
        'start_deleted_at' => ['except' => ''],
        'end_deleted_at' => ['except' => ''],
        'active' => ['except' => ''],
        'row' => ['except' => ''],

        'sms' => ['except' => ''],
        'call' => ['except' => ''],
        'fax' => ['except' => ''],
        'whatsapp' => ['except' => ''],
        'email' => ['except' => ''],
        'address' => ['except' => ''],
        'google_maps' => ['except' => ''],
        'google_maps_iframe' => ['except' => ''],
        'about_us' => ['except' => ''],
        'about_us_id' => ['except' => ''],
        'vision' => ['except' => ''],
        'vision_id' => ['except' => ''],
        'mission' => ['except' => ''],
        'mission_id' => ['except' => ''],
        'history' => ['except' => ''],
        'history_id' => ['except' => ''],
    ];

    public function resetFilter()
    {
        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = 'id';
        $this->sort_by = 'desc';

        $this->reset([
            'created_by_id',
            'updated_by_id',
            'deleted_by_id',
            'start_created_at',
            'end_created_at',
            'start_updated_at',
            'end_updated_at',
            'start_deleted_at',
            'end_deleted_at',
            'active',
            'row',
        ]);

        $this->reset([
            'setting',
            'sms',
            'call',
            'fax',
            'whatsapp',
            'email',
            'address',
            'google_maps',
            'google_maps_iframe',
            'about_us',
            'about_us_id',
            'vision',
            'vision_id',
            'mission',
            'mission_id',
            'history',
            'history_id',
        ]);
    }

    public function resetForm()
    {
        if ($this->setting) {
            $this->active = $this->setting->active;
            $this->sms = $this->setting->sms;
            $this->call = $this->setting->call;
            $this->fas = $this->setting->fas;
            $this->whatsapp = $this->setting->whatsapp;
            $this->email = $this->setting->email;
            $this->address = $this->setting->address;
            $this->google_maps = $this->setting->google_maps;
            $this->google_maps_iframe = $this->setting->google_maps_iframe;
            $this->about_us = $this->setting->about_us;
            $this->about_us_id = $this->setting->about_us_id;
            $this->vision = $this->setting->vision;
            $this->vision_id = $this->setting->vision_id;
            $this->mission = $this->setting->mission;
            $this->mission_id = $this->setting->mission_id;
            $this->history = $this->setting->history;
            $this->history_id = $this->setting->history_id;
        }
    }

    public function refresh()
    {
        $this->resetErrorBag();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        if ($this->menu_type != 'index' && $this->menu_type != 'trash') {
            $this->validateOnly($propertyName);
        }
    }

    public function mount()
    {
        if (
            $this->menu_type != 'index' &&
            $this->menu_type != 'add' &&
            $this->menu_type != 'clone' &&
            $this->menu_type != 'edit' &&
            $this->menu_type != 'view' &&
            $this->menu_type != 'trash'
        ) {
            Session::flash('danger', trans('index.Menu Type').' '.trans('index.not found or has been deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->setting = Setting::withTrashed()->find($this->row);
            } else {
                $this->setting = Setting::find($this->row);
            }

            if (! $this->setting) {
                Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));

                return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
            }

            if ($this->menu_type != 'view') {
                $this->resetForm();
            }
        }
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function form($menu_type, $id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->active = true;

        if ($menu_type != 'add' && $id) {
            $this->setting = Setting::find($id);

            if (! $this->setting) {
                return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
            }

            $this->resetForm();
        }

        $this->menu_type = $menu_type;
        $this->row = $id;
    }

    public function view($id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'view';
        $this->row = $id;

        $this->setting = Setting::withTrashed()->find($id);

        if (! $this->setting) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }
    }

    public function trash()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'trash';
    }

    public function rules()
    {
        $id = $this->menu_type == 'edit' ? $this->setting->id : null;

        return [
            'active' => 'required',
            'sms' => 'nullable|max:20',
            'call' => 'nullable|max:20',
            'fax' => 'nullable|max:20',
            'whatsapp' => 'nullable|max:20',
            'email' => 'nullable|email|max:50',
            'address' => 'nullable|max:200',
            'google_maps' => 'nullable|url|max:100',
            'google_maps_iframe' => 'nullable|url|max:500',
            'about_us' => 'nullable|max:65535',
            'about_us_id' => 'nullable|max:65535',
            'mission' => 'nullable|max:65535',
            'mission_id' => 'nullable|max:65535',
            'mission' => 'nullable|max:65535',
            'mission_id' => 'nullable|max:65535',
            'history' => 'nullable|max:65535',
            'history_id' => 'nullable|max:65535',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->setting = new Setting();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->setting->active = $this->active;

        $this->setting->sms = $this->sms;
        $this->setting->call = $this->call;
        $this->setting->fax = $this->fax;
        $this->setting->whatsapp = $this->whatsapp;
        $this->setting->email = $this->email;
        $this->setting->address = $this->address;
        $this->setting->google_maps = $this->google_maps;
        $this->setting->google_maps_iframe = $this->google_maps_iframe;
        $this->setting->about_us = $this->about_us;
        $this->setting->about_us_id = $this->about_us_id;
        $this->setting->vision = $this->vision;
        $this->setting->vision_id = $this->vision_id;
        $this->setting->mission = $this->mission;
        $this->setting->mission_id = $this->mission_id;
        $this->setting->history = $this->history;
        $this->setting->history_id = $this->history_id;
        $this->setting->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("index.{$this->menu_name}").' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->setting = Setting::find($id);

        if (! $this->setting) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->setting->active = true;
        $this->setting->save();
        $this->setting->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->setting = Setting::find($id);

        if (! $this->setting) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->setting->active = false;
        $this->setting->save();
        $this->setting->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->setting = Setting::find($id);

        if (! $this->setting) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->setting->delete();
        $this->setting->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->setting = Setting::onlyTrashed()->find($id);

        if (! $this->setting) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->setting->restore();
        $this->setting->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->setting = Setting::onlyTrashed()->find($id);

        if (! $this->setting) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->setting->forceDelete();
        $this->setting->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Setting::onlyTrashed()->restore();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Setting::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.All')." {$this->menu_name} ".trans('index.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Setting::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Setting::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Setting::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataSetting()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_setting = Setting::query()
                ->when($this->created_by_id, function ($query) {
                    $query->where('created_by_id', $this->created_by_id);
                })
                ->when($this->updated_by_id, function ($query) {
                    $query->where('updated_by_id', $this->updated_by_id);
                })
                ->when($this->deleted_by_id, function ($query) {
                    $query->where('deleted_by_id', $this->deleted_by_id);
                })
                ->when($this->start_created_at, function ($query) {
                    $query->whereDate('created_at', '>=', $this->start_created_at);
                })
                ->when($this->end_created_at, function ($query) {
                    $query->whereDate('created_at', '<=', $this->end_created_at);
                })
                ->when($this->start_updated_at, function ($query) {
                    $query->whereDate('updated_at', '>=', $this->start_updated_at);
                })
                ->when($this->end_updated_at, function ($query) {
                    $query->whereDate('updated_at', '<=', $this->end_updated_at);
                })
                ->when($this->start_deleted_at, function ($query) {
                    $query->whereDate('deleted_at', '>=', $this->start_deleted_at);
                })
                ->when($this->end_deleted_at, function ($query) {
                    $query->whereDate('deleted_at', '<=', $this->end_deleted_at);
                })
                ->when($this->active, function ($query) {
                    $query->where('active', $this->active);
                })

                ->when($this->sms, function ($query) {
                    $query->where('sms', 'LIKE', "%{$this->sms}%");
                })
                ->when($this->call, function ($query) {
                    $query->where('call', 'LIKE', "%{$this->call}%");
                })
                ->when($this->fax, function ($query) {
                    $query->where('fax', 'LIKE', "%{$this->fax}%");
                })
                ->when($this->whatsapp, function ($query) {
                    $query->where('whatsapp', 'LIKE', "%{$this->whatsapp}%");
                })
                ->when($this->email, function ($query) {
                    $query->where('email', 'LIKE', "%{$this->email}%");
                })
                ->when($this->address, function ($query) {
                    $query->where('address', 'LIKE', "%{$this->address}%");
                })
                ->when($this->google_maps, function ($query) {
                    $query->where('google_maps', 'LIKE', "%{$this->google_maps}%");
                })
                ->when($this->google_maps_iframe, function ($query) {
                    $query->where('google_maps_iframe', 'LIKE', "%{$this->google_maps_iframe}%");
                })
                ->when($this->about_us, function ($query) {
                    $query->where('about_us', 'LIKE', "%{$this->about_us}%");
                })
                ->when($this->about_us_id, function ($query) {
                    $query->where('about_us_id', 'LIKE', "%{$this->about_us_id}%");
                })
                ->when($this->vision, function ($query) {
                    $query->where('vision', 'LIKE', "%{$this->vision}%");
                })
                ->when($this->vision_id, function ($query) {
                    $query->where('vision_id', 'LIKE', "%{$this->vision_id}%");
                })
                ->when($this->mission, function ($query) {
                    $query->where('mission', 'LIKE', "%{$this->mission}%");
                })
                ->when($this->mission_id, function ($query) {
                    $query->where('mission_id', 'LIKE', "%{$this->mission_id}%");
                })
                ->when($this->history, function ($query) {
                    $query->where('history', 'LIKE', "%{$this->history}%");
                })
                ->when($this->history_id, function ($query) {
                    $query->where('history_id', 'LIKE', "%{$this->history_id}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_setting->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_setting->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_setting->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_setting->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_setting->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_setting->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_setting->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_setting->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_setting->onlyTrashed();
            }

            return $data_setting->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_setting' => $this->getDataSetting(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
