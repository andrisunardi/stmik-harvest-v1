<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use App\Models\Registration;
use App\Models\Admin;

class RegistrationComponent extends Component
{
    use WithPagination;

    public $menu_name = "Registration";
    public $menu_icon = "bi bi-pencil";
    public $menu_slug = "registration";
    public $menu_table = "registration";
    public $menu_type = "index";

    public $page = 1;
    public $per_page = 10;
    public $order_by = "id";
    public $sort_by = "desc";
    public $start_created_at;
    public $end_created_at;
    public $start_updated_at;
    public $end_updated_at;
    public $start_deleted_at;
    public $end_deleted_at;
    public $created_by;
    public $updated_by;
    public $deleted_by;
    public $active;
    public $row;
    public $checkbox_all;
    public $checkbox_id;

    public $registration;
    public $name;
    public $email;
    public $phone;
    public $gender = "";
    public $school;
    public $major;
    public $city;
    public $type = "";

    public $queryString = [
        "menu_type" => ["except" => "index"],
        "page" => ["except" => 1],
        "per_page" => ["except" => 10],
        "order_by" => ["except" => "id"],
        "sort_by" => ["except" => "desc"],
        "created_by" => ["except" => ""],
        "updated_by" => ["except" => ""],
        "deleted_by" => ["except" => ""],
        "start_created_at" => ["except" => ""],
        "end_created_at" => ["except" => ""],
        "start_updated_at" => ["except" => ""],
        "end_updated_at" => ["except" => ""],
        "start_deleted_at" => ["except" => ""],
        "end_deleted_at" => ["except" => ""],
        "active" => ["except" => ""],
        "row" => ["except" => ""],

        "name" => ["except" => ""],
        "email" => ["except" => ""],
        "phone" => ["except" => ""],
        "gender" => ["except" => ""],
        "school" => ["except" => ""],
        "major" => ["except" => ""],
        "city" => ["except" => ""],
        "type" => ["except" => ""],
    ];

    public function resetFilter()
    {
        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = "id";
        $this->sort_by = "desc";

        $this->reset([
            "created_by",
            "updated_by",
            "start_created_at",
            "end_created_at",
            "start_updated_at",
            "end_updated_at",
            "start_deleted_at",
            "end_deleted_at",
            "active",
            "row",
        ]);

        $this->reset([
            "registration",
            "name",
            "email",
            "phone",
            "gender",
            "school",
            "major",
            "city",
            "type",
        ]);
    }

    public function resetForm()
    {
        if ($this->registration) {
            $this->active = $this->registration->active;
            $this->name = $this->registration->name;
            $this->email = $this->registration->email;
            $this->phone = $this->registration->phone;
            $this->gender = $this->registration->gender;
            $this->school = $this->registration->school;
            $this->major = $this->registration->major;
            $this->city = $this->registration->city;
            $this->type = $this->registration->type;
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
        if ($this->menu_type != "index" && $this->menu_type != "trash") {
            $this->validateOnly($propertyName);
        }
    }

    public function mount()
    {
        if (
            $this->menu_type != "index" &&
            $this->menu_type != "add" &&
            $this->menu_type != "clone" &&
            $this->menu_type != "edit" &&
            $this->menu_type != "view" &&
            $this->menu_type != "trash"
        ) {
            Session::flash("danger", trans("index.Menu Type") . " " . trans("message.not found or has been deleted"));
            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == "add") {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != "index" || $this->menu_type != "trash")) {
            if ($this->menu_type == "view") {
                $this->registration = Registration::withTrashed()->find($this->row);
            } else {
                $this->registration = Registration::find($this->row);
            }

            if (!$this->registration) {
                Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
                return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
            }

            if ($this->menu_type != "view") {
                $this->resetForm();
            }
        }
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function form($menu_type, $id)
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->active = true;

        if ($menu_type != "add" && $id) {
            $this->registration = Registration::find($id);

            if (!$this->registration) {
                return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
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

        $this->menu_type = "view";
        $this->row = $id;

        $this->registration = Registration::withTrashed()->find($id);

        if (!$this->registration) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }
    }

    public function trash()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "trash";
    }

    protected function rules()
    {
        $id = $this->menu_type == "edit" ? $this->registration->id : null;

        return [
            "active"    => "required",
            "name"      => "required|max:50|unique:{$this->menu_table},name,{$id}",
            "email"     => "required|max:50|email|unique:{$this->menu_table},email,{$id}",
            "phone"     => "required|max:15|unique:{$this->menu_table},phone,{$id}",
            "gender"    => "required|numeric|" . Rule::in([1, 2]),
            "school"    => "required|max:50",
            "major"     => "required|max:50",
            "city"      => "required|max:50",
            "type"      => "required|numeric|" . Rule::in([1, 2]),
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->menu_type == "add" || $this->menu_type == "clone") {
            $this->registration = new Registration();
            if (env("APP_ENV") != "testing") {
                DB::statement(DB::raw("ALTER TABLE {$this->menu_table} AUTO_INCREMENT = 1"));
            }
        }

        $this->registration->active = $this->active;

        $this->registration->name = $this->name;
        $this->registration->email = $this->email;
        $this->registration->phone = $this->phone;
        $this->registration->gender = $this->gender;
        $this->registration->school = $this->school;
        $this->registration->major = $this->major;
        $this->registration->city = $this->city;
        $this->registration->type = $this->type;
        $this->registration->save();

        if (env("APP_ENV") == "production") {
            Mail::send("email.registration", [
                "registration" => $this->registration,
                "created_at" => now(),
            ], function ($message) {
                $message
                    ->to(env("CONTACT_EMAIL"))
                    ->cc(env("CONTACT_EMAIL"))
                    ->bcc(env("CONTACT_EMAIL"))
                    ->subject("Online Registration Form - " . date("d F Y"));
            });
        }

        $this->menu_type_message = $this->menu_type == "add" || $this->menu_type == "edit" ? $this->menu_type . "ed" : $this->menu_type . "d";
        Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been {$this->menu_type_message} successfully"));

        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = "index";
    }

    public function active($id)
    {
        $this->registration = Registration::find($id);

        if (!$this->registration) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->registration->active = true;
        $this->registration->save();
        $this->registration->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set active successfully"));
    }

    public function nonActive($id)
    {
        $this->registration = Registration::find($id);

        if (!$this->registration) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->registration->active = false;
        $this->registration->save();
        $this->registration->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been set non active successfully"));
    }

    public function delete($id)
    {
        $this->registration = Registration::find($id);

        if (!$this->registration) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->registration->delete();
        $this->registration->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function restore($id)
    {
        $this->registration = Registration::onlyTrashed()->find($id);

        if (!$this->registration) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->registration->restore();
        $this->registration->refresh();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted successfully"));
    }

    public function deletePermanent($id)
    {
        $this->registration = Registration::onlyTrashed()->find($id);

        if (!$this->registration) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }

        $this->registration->forceDelete();
        $this->registration->refresh();

        if ($this->menu_type == "view") {
            $this->resetFilter();
            $this->resetErrorBag();

            $this->menu_type = "index";
        }

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been deleted permanent successfully"));
    }

    public function restoreAll()
    {
        Registration::onlyTrashed()->restore();

        return Session::flash("success", trans("page.{$this->menu_name}") . " " . trans("message.has been restored successfully"));
    }

    public function deletePermanentAll()
    {
        Registration::onlyTrashed()->forceDelete();

        return Session::flash("success", trans("message.All") . " {$this->menu_name} " . trans("message.at Trash has been Deleted Permanent Successfully"));
    }

    public function getDataCreatedBy()
    {
        $created_by = Registration::groupBy("created_by")->active()->pluck("created_by");
        return Admin::whereIn("id", $created_by)->active()->orderBy("name")->get();
    }

    public function getDataUpdatedBy()
    {
        $updated_by = Registration::groupBy("updated_by")->active()->pluck("updated_by");
        return Admin::whereIn("id", $updated_by)->active()->orderBy("name")->get();
    }

    public function getDataDeletedBy()
    {
        $deleted_by = Registration::groupBy("deleted_by")->active()->pluck("deleted_by");
        return Admin::whereIn("id", $deleted_by)->active()->orderBy("name")->get();
    }

    public function getDataRegistration()
    {
        if ($this->menu_type == "index" || $this->menu_type == "trash") {
            $data_registration = Registration::query()
                ->when($this->created_by, function ($query) {
                    $query->where("created_by", $this->created_by);
                })
                ->when($this->updated_by, function ($query) {
                    $query->where("updated_by", $this->updated_by);
                })
                ->when($this->deleted_by, function ($query) {
                    $query->where("deleted_by", $this->deleted_by);
                })
                ->when($this->start_created_at, function ($query) {
                    $query->whereDate("created_at", ">=", $this->start_created_at);
                })
                ->when($this->end_created_at, function ($query) {
                    $query->whereDate("created_at", "<=", $this->end_created_at);
                })
                ->when($this->start_updated_at, function ($query) {
                    $query->whereDate("updated_at", ">=", $this->start_updated_at);
                })
                ->when($this->end_updated_at, function ($query) {
                    $query->whereDate("updated_at", "<=", $this->end_updated_at);
                })
                ->when($this->start_deleted_at, function ($query) {
                    $query->whereDate("deleted_at", ">=", $this->start_deleted_at);
                })
                ->when($this->end_deleted_at, function ($query) {
                    $query->whereDate("deleted_at", "<=", $this->end_deleted_at);
                })
                ->when($this->active, function ($query) {
                    $query->where("active", $this->active);
                })

                ->when($this->name, function ($query) {
                    $query->where("name", "LIKE", "%{$this->name}%");
                })
                ->when($this->email, function ($query) {
                    $query->where("email", "LIKE", "%{$this->email}%");
                })
                ->when($this->phone, function ($query) {
                    $query->where("phone", "LIKE", "%{$this->phone}%");
                })
                ->when($this->gender, function ($query) {
                    $query->where("gender", $this->gender);
                })
                ->when($this->school, function ($query) {
                    $query->where("school", "LIKE", "%{$this->school}%");
                })
                ->when($this->major, function ($query) {
                    $query->where("major", "LIKE", "%{$this->major}%");
                })
                ->when($this->city, function ($query) {
                    $query->where("city", "LIKE", "%{$this->city}%");
                })
                ->when($this->type, function ($query) {
                    $query->where("type", $this->type);
                });

                if ($this->created_by || $this->created_by == "0") {
                    $data_registration->where("created_by", $this->created_by);
                }
                if ($this->updated_by || $this->updated_by == "0") {
                    $data_registration->where("updated_by", $this->updated_by);
                }
                if ($this->deleted_by || $this->deleted_by == "0") {
                    $data_registration->where("deleted_by", $this->deleted_by);
                }
                if ($this->active || $this->active == "0") {
                    $data_registration->where("active", $this->active);
                }

                if ($this->order_by == "created_by") {
                    $data_registration->join("admin", "admin.id", "{$this->menu_table}.created_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "updated_by") {
                    $data_registration->join("admin", "admin.id", "{$this->menu_table}.updated_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else if ($this->order_by == "deleted_by") {
                    $data_registration->join("admin", "admin.id", "{$this->menu_table}.deleted_by")
                        ->select("{$this->menu_table}.*", "admin.name as admin_name")
                        ->orderByRaw("admin_name {$this->sort_by}");
                } else {
                    $data_registration->orderBy($this->order_by ?? "id", $this->sort_by ?? "desc");
                }

                if ($this->menu_type == "trash") {
                    $data_registration->onlyTrashed();
                }

                return $data_registration->paginate($this->per_page ?? 10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_created_by" => $this->getDataCreatedBy(),
            "data_updated_by" => $this->getDataUpdatedBy(),
            "data_deleted_by" => $this->getDataDeletedBy(),
            "data_registration" => $this->getDataRegistration(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}
