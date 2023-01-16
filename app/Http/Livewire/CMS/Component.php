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

    public function message(string $message)
    {
        return $message;
    }

    public function checkPermission(string $pageType, string $type, string $permission)
    {
        if ($pageType == $type && auth()->user()->can($permission) === false) {
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
