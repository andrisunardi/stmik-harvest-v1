<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Component extends LivewireComponent
{
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public $subDomain = 'cms';

    public $bgClass;

    public $pageName;

    public $pageTitle;

    public $pageSlug;

    public $pageIcon;

    public $pageTable;

    public $pageCategoryName;

    public $pageCategoryTitle;

    public $pageCategorySlug;

    public $pageSubCategoryName;

    public $pageSubCategoryTitle;

    public $pageSubCategorySlug;

    public $readyToLoad = false;

    public $pageType = 'index';

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

    public $row;

    public $advanced_search = false;

    public $action = [];

    public $detail = [];

    public $checkbox_all;

    public $checkbox_id;

    public function mount()
    {
        $this->bgClass = collect([
            'bg-primary',
            'bg-success',
            'bg-warning',
            'bg-danger',
            'bg-info',
            'bg-secondary',
        ]);
    }

    public function loadData()
    {
        $this->readyToLoad = true;

        $this->alert('info', trans('index.data_have_been_loaded_successfully'));
    }

    public function refresh()
    {
        $this->resetValidation();

        $this->alert('info', trans('index.refresh'));
    }

    public function sort($column, $sort)
    {
        $this->order_by = $column;
        $this->sort_by = $sort;

        $this->resetPage();

        $this->alert('info', trans('index.sort').' '.trans("index.{$column}").' '.trans("index.{$sort}"));
    }

    public function advancedSearch()
    {
        $this->advanced_search = ! $this->advanced_search;

        $this->alert('info', trans('index.advanced_search'));
    }

    public function updating($name, $value)
    {
        $this->resetPage();

        $this->alert('info', trans('index.updating').' '.trans("validation.attributes.{$name}").' : '.json_encode($value));
    }

    public function updated($name, $value)
    {
        $this->resetPage();

        $this->alert('info', trans('index.updated').' '.trans("validation.attributes.{$name}").' : '.json_encode($value));
    }

    public function action($id)
    {
        $this->action[$id] = empty($this->action[$id]) ? true : false;

        if (! $this->action[$id]) {
            unset($this->action[$id]);
        }

        $this->alert('info', trans('index.action')." - ID: {$id}");
    }

    public function detail($id)
    {
        $this->detail[$id] = empty($this->detail[$id]) ? true : false;

        if (! $this->detail[$id]) {
            unset($this->detail[$id]);
        }

        $this->alert('info', trans('index.detail')." - ID: {$id}");
    }

    public function cancelUploadImage()
    {
        $this->checkPermission('edit');
        $this->reset(['image']);
        $this->alert('success', trans('index.upload_image_has_been_cancelled_successfully'));
    }

    public function cancelUploadFile()
    {
        $this->checkPermission('edit');
        $this->reset(['file']);
        $this->alert('success', trans('index.upload_file_has_been_cancelled_successfully'));
    }

    public function resetFilterGlobal()
    {
        $this->resetPage();
        $this->resetValidation();

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
            'row',
            'checkbox_id',
            'action',
            'detail',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function index()
    {
        $this->pageType('index', 'back_to_list_data');
    }

    public function add()
    {
        $this->pageType('add', 'add_form');

        $this->default();
    }

    public function trash()
    {
        $this->pageType('trash', 'data_trash');
    }

    public function checkPermission(string $type = null)
    {
        $type = $type ?? $this->pageType;
        $permission = "{$this->pageName} ".Str::headline($type);

        if ($type != 'index' && ! auth()->user()->can($permission)) {
            abort(403);
        }

        return true;
    }

    public function pageType(string $pageType = null, string $message = null)
    {
        $this->checkPermission();
        $this->resetFilter();

        $this->pageType = $pageType;

        $this->alert('info', trans("index.{$message}"));
    }
}
