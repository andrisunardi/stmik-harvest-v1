<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use App\Models\Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class NewsletterComponent extends Component
{
    use WithPagination;

    public $menu_name = 'Newsletter';

    public $menu_icon = 'bi bi-envelope';

    public $menu_slug = 'newsletter';

    public $menu_table = 'newsletter';

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

    public $newsletter;

    public $email;

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

        'email' => ['except' => ''],
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
            'newsletter',
            'email',
        ]);
    }

    public function resetForm()
    {
        $this->active = $this->newsletter->active;
        $this->email = $this->newsletter->email;
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
                $this->newsletter = Newsletter::withTrashed()->find($this->row);
            } else {
                $this->newsletter = Newsletter::find($this->row);
            }

            if (! $this->newsletter) {
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
            $this->newsletter = Newsletter::find($id);

            if (! $this->newsletter) {
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

        $this->newsletter = Newsletter::withTrashed()->find($id);

        if (! $this->newsletter) {
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
        return [
            'active' => 'required',
            'email' => 'required|email|max:50',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            $this->newsletter = new Newsletter();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->newsletter->active = $this->active;

        $this->newsletter->email = $this->email;
        $this->newsletter->save();

        if (env('APP_ENV') == 'production') {
            Mail::send('email.newsletter', [
                'newsletter' => $this->newsletter,
                'created_at' => now(),
            ], function ($message) {
                $message
                    ->to(env('CONTACT_EMAIL'))
                    ->cc(env('CONTACT_EMAIL'))
                    ->bcc(env('CONTACT_EMAIL'))
                    ->subject('Newsletter Form - '.date('d F Y'));
            });
        }

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("index.{$this->menu_name}").' '.trans("index.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->newsletter = Newsletter::find($id);

        if (! $this->newsletter) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->newsletter->active = true;
        $this->newsletter->save();
        $this->newsletter->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->newsletter = Newsletter::find($id);

        if (! $this->newsletter) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->newsletter->active = false;
        $this->newsletter->save();
        $this->newsletter->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->newsletter = Newsletter::find($id);

        if (! $this->newsletter) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->newsletter->delete();
        $this->newsletter->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->newsletter = Newsletter::onlyTrashed()->find($id);

        if (! $this->newsletter) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->newsletter->restore();
        $this->newsletter->refresh();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->newsletter = Newsletter::onlyTrashed()->find($id);

        if (! $this->newsletter) {
            return Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));
        }

        $this->newsletter->forceDelete();
        $this->newsletter->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Newsletter::onlyTrashed()->restore();

        return Session::flash('success', trans("index.{$this->menu_name}").' '.trans('index.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        Newsletter::onlyTrashed()->forceDelete();

        return Session::flash('success', trans('index.All')." {$this->menu_name} ".trans('index.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Newsletter::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Newsletter::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Newsletter::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataNewsletter()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_newsletter = Newsletter::query()
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

                ->when($this->email, function ($query) {
                    $query->where('email', 'LIKE', "%{$this->email}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_newsletter->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_newsletter->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_newsletter->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_newsletter->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_newsletter->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_newsletter->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_newsletter->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } else {
                $data_newsletter->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_newsletter->onlyTrashed();
            }

            return $data_newsletter->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_newsletter' => $this->getDataNewsletter(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
