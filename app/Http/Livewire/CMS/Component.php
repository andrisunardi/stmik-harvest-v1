<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Session;
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

    public $subDomain = 'cms';

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

    public function checkPermission(string $type = null)
    {
        $type = $type ?? $this->pageType;
        $permission = "{$this->pageName} " . Str::title($type);

        if ($type != "index" && !auth()->user()->can($permission)) {
            abort(403);
        }

        return true;
    }

    // public function active(Bank $bank)
    // {
    //     $this->globalActive($bank);
    // }

    // public function delete(Bank $bank)
    // {
    //     $this->globalDelete($bank);
    // }

    // public function restore($id)
    // {
    //     $this->globalRestore(Bank::class, $id);
    // }

    public function globalActive($model)
    {
        $name = Str::slug(Str::substr(get_class($model), 11));
        $active = Str::slug(Str::active($model->is_active), '_');

        $model->is_active = ! $model->is_active;
        $model->save();
        $model->refresh();

        return Session::flash('success', trans("index.{$name}").' '.trans("index.has_been_set_{$active}_successfully"));
    }

    public function globalDelete($model)
    {
        $name = Str::slug(Str::substr(get_class($model), 11));

        $model->delete();
        $model->refresh();

        return Session::flash('success', trans("index.{$name}").' '.trans('index.has_been_deleted_successfully'));
    }

    public function globalRestore($model, $id)
    {
        $name = Str::slug(Str::substr($model, 11));

        $model = $model::onlyTrashed()->find($id);
        if (! $model) {
            return Session::flash('danger', trans('index.'.Str::slug($this->pageName, '_')).' '.trans('index.not_found_or_has_been_deleted'));
        }

        $model->restore();
        $model->refresh();

        return Session::flash('success', trans("index.{$name}").' '.trans('index.has_been_restored_successfully'));
    }
}
