<?php

namespace App\Http\Livewire\CMS;

use App\Models\Access;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $menu_name = 'Admin';

    public $menu_icon = 'bi bi-people';

    public $menu_slug = 'admin';

    public $menu_table = 'admin';

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

    public $admin;

    public $access_id = '';

    public $name;

    public $email;

    public $username;

    public $password;

    public $image;

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

        'access_id' => ['except' => ''],
        'name' => ['except' => ''],
        'email' => ['except' => ''],
        'username' => ['except' => ''],
        'password' => ['except' => ''],
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
            'admin',
            'access',
            'name',
            'email',
            'username',
            'password',
            'image',
        ]);
    }

    public function resetForm()
    {
        if ($this->admin) {
            $this->active = $this->admin->active;
            $this->access = $this->admin->access?->id;
            $this->name = $this->admin->name;
            $this->email = $this->admin->email;
            $this->username = $this->admin->username;
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

    public function mount()
    {
        if (! auth()->user()->hasRole('Super Admin')) {
            Session::flash('danger', trans('message.You dont have authorization to access this page'));

            return redirect()->route("{$this->sub_domain}.index");
        }

        if (
            $this->menu_type != 'index' &&
            $this->menu_type != 'add' &&
            $this->menu_type != 'clone' &&
            $this->menu_type != 'edit' &&
            $this->menu_type != 'view' &&
            $this->menu_type != 'trash'
        ) {
            Session::flash('danger', trans('index.Menu Type').' '.trans('message.not found or has been deleted'));

            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == 'add') {
            $this->active = true;
        }

        if (($this->row || $this->row == '0') && ($this->menu_type != 'index' || $this->menu_type != 'trash')) {
            if ($this->menu_type == 'view') {
                $this->admin = Admin::withTrashed()->find($this->row);
            } else {
                $this->admin = Admin::find($this->row);
            }

            if (! $this->admin) {
                Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));

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
            $this->admin = Admin::find($id);

            if (! $this->admin) {
                return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
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

        $this->admin = Admin::withTrashed()->find($id);

        if (! $this->admin) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
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
        $id = $this->menu_type == 'edit' ? $this->admin->id : null;
        $password = $this->menu_type == 'edit' ? 'nullable' : 'required';

        return [
            'active' => 'required',
            'access' => 'required|exists:access,id',
            'name' => "required|max:50|unique:{$this->menu_table},name,{$id}",
            'email' => "required|email|max:50|unique:{$this->menu_table},email,{$id}",
            'username' => "required|max:50|unique:{$this->menu_table},username,{$id}",
            'password' => "{$password}|max:50",
            'image' => 'nullable|image|max:1048576|mimes:jpg,jpeg,png,gif,webp',
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == 'add' || $this->menu_type == 'clone') {
            if ($this->menu_type == 'clone') {
                $image = $this->admin->image;
            }
            $this->admin = new Admin();
            if (env('APP_ENV') != 'testing') {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->admin->active = $this->active;

        $this->admin->access_id = $this->access;
        $this->admin->name = $this->name;
        $this->admin->email = $this->email;
        $this->admin->username = $this->username;

        if ($this->password) {
            $this->admin->password = Hash::make($this->password);
        }

        if ($this->image) {
            if ($this->menu_type == 'edit') {
                $this->admin->deleteImage();
            }

            $this->admin->image = date('YmdHis').".{$this->image->getClientOriginalExtension()}";
            $this->image->storePubliclyAs($this->menu_slug, $this->admin->image, 'images');
        } else {
            if ($this->menu_type == 'clone') {
                if ($image && File::exists(public_path("images/{$this->menu_slug}/{$image}"))) {
                    $this->admin->image = date('YmdHis').'.'.explode('.', $image)[1];
                    File::copy(public_path("images/{$this->menu_slug}/{$image}"), public_path("images/{$this->menu_slug}/{$this->admin->image}"));
                }
            }
        }

        $this->admin->save();

        $this->menu_type_message = $this->menu_type == 'add' || $this->menu_type == 'edit' ? $this->menu_type.'ed' : $this->menu_type.'d';
        Session::flash('success', trans("page.{$this->menu_name}").' '.trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function active($id)
    {
        $this->admin = Admin::find($id);

        if (! $this->admin) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->admin->active = true;
        $this->admin->save();
        $this->admin->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set active successfully'));
    }

    public function nonActive($id)
    {
        $this->admin = Admin::find($id);

        if (! $this->admin) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->admin->active = false;
        $this->admin->save();
        $this->admin->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been set non active successfully'));
    }

    public function delete($id)
    {
        $this->admin = Admin::find($id);

        if (! $this->admin) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->admin->delete();
        $this->admin->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function restore($id)
    {
        $this->admin = Admin::onlyTrashed()->find($id);

        if (! $this->admin) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->admin->restore();
        $this->admin->refresh();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted successfully'));
    }

    public function deletePermanent($id)
    {
        $this->admin = Admin::onlyTrashed()->find($id);

        if (! $this->admin) {
            return Session::flash('danger', trans("page.{$this->menu_name}").' '.trans('message.not found or has been deleted'));
        }

        $this->admin->deleteImage();
        $this->admin->forceDelete();
        $this->admin->refresh();

        if ($this->menu_type == 'view') {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = 'index';
        }

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been deleted permanent successfully'));
    }

    public function restoreAll()
    {
        Admin::onlyTrashed()->restore();

        return Session::flash('success', trans("page.{$this->menu_name}").' '.trans('message.has been restored successfully'));
    }

    public function deletePermanentAll()
    {
        $data_admin = Admin::onlyTrashed()->get();

        foreach ($data_admin as $admin) {
            $admin->deleteImage();
            $admin->forceDelete();
        }

        return Session::flash('success', trans('message.All')." {$this->menu_name} ".trans('message.at Trash has been Deleted Permanent Successfully'));
    }

    public function getDataCreatedBy()
    {
        $created_by = Admin::groupBy('created_by_id')->active()->pluck('created_by_id');

        return Admin::whereIn('id', $created_by)->active()->orderBy('name')->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Admin::groupBy('updated_by_id')->active()->pluck('updated_by_id');

        return Admin::whereIn('id', $updated_by)->active()->orderBy('name')->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Admin::groupBy('deleted_by_id')->active()->pluck('deleted_by_id');

        return Admin::whereIn('id', $deleted_by)->active()->orderBy('name')->get();
    }

    public function getDataAccess()
    {
        return Access::active()->orderBy('name')->get();
    }

    public function getDataAdmin()
    {
        if ($this->menu_type == 'index' || $this->menu_type == 'trash') {
            $data_admin = Admin::with('access')
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

                ->when($this->access, function ($query) {
                    $query->where('access_id', $this->access);
                })
                ->when($this->name, function ($query) {
                    $query->where('name', 'LIKE', "%{$this->name}%");
                })
                ->when($this->email, function ($query) {
                    $query->where('email', 'LIKE', "%{$this->email}%");
                })
                ->when($this->username, function ($query) {
                    $query->where('username', 'LIKE', "%{$this->username}%");
                });

            if ($this->created_by_id || $this->created_by_id == '0') {
                $data_admin->where('created_by_id', $this->created_by_id);
            }
            if ($this->updated_by_id || $this->updated_by_id == '0') {
                $data_admin->where('updated_by_id', $this->updated_by_id);
            }
            if ($this->deleted_by_id || $this->deleted_by_id == '0') {
                $data_admin->where('deleted_by_id', $this->deleted_by_id);
            }
            if ($this->active || $this->active == '0') {
                $data_admin->where('active', $this->active);
            }

            if ($this->order_by == 'created_by_id') {
                $data_admin->join('admin', 'admin.id', "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'updated_by_id') {
                $data_admin->join('admin', 'admin.id', "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'deleted_by_id') {
                $data_admin->join('admin', 'admin.id', "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", 'admin.name as admin_name')
                        ->orderByRaw("admin_name {$this->sort_by}");
            } elseif ($this->order_by == 'access_id') {
                $data_admin->join('access', 'access.id', "{$this->menu_table}.access_id")
                        ->select("{$this->menu_table}.*", 'access.name as access_name')
                        ->orderByRaw("access_name {$this->sort_by}");
            } else {
                $data_admin->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc');
            }

            if ($this->menu_type == 'trash') {
                $data_admin->onlyTrashed();
            }

            return $data_admin->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            'data_created_by' => $this->getDataCreatedBy(),
            'data_updated_by' => $this->getDataUpdatedBy(),
            'data_deleted_by' => $this->getDataDeletedBy(),
            'data_access' => $this->getDataAccess(),
            'data_admin' => $this->getDataAdmin(),
        ])->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
