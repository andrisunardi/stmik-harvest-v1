<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class ActivityComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Activity';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-history';
        $this->pageTable = 'activity_log';
        $this->pageCategoryName = 'Configuration';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $activity;

    public $log_name = '';

    public $description;

    public $event = '';

    public $subject_type = '';

    public $subject_id;

    public $causer_type = '';

    public $causer_id;

    public $properties;

    public $batch_uuid = '';

    public $user_id = '';

    public $queryString = [
        'page' => ['except' => 1],
        'per_page' => ['except' => 10],
        'order_by' => ['except' => 'id'],
        'sort_by' => ['except' => 'desc'],
        'start_created_at' => ['except' => ''],
        'end_created_at' => ['except' => ''],
        'start_updated_at' => ['except' => ''],
        'end_updated_at' => ['except' => ''],
        'start_deleted_at' => ['except' => ''],
        'end_deleted_at' => ['except' => ''],
        'row' => ['except' => ''],
        'advanced_search' => ['except' => false],

        'log_name' => ['except' => ''],
        'description' => ['except' => ''],
        'subject_type' => ['except' => ''],
        'event' => ['except' => ''],
        'subject_id' => ['except' => ''],
        'causer_type' => ['except' => ''],
        'causer_id' => ['except' => ''],
        'properties' => ['except' => ''],
        'batch_uuid' => ['except' => ''],
        'user_id' => ['except' => ''],
    ];

    public function loadData()
    {
        $this->readyToLoad = true;

        $this->alert('info', trans('index.data_have_been_loaded_successfully'));
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

    public function resetFilter()
    {
        $this->resetPage();

        $this->page = 1;
        $this->per_page = 10;
        $this->order_by = 'id';
        $this->sort_by = 'desc';

        $this->reset([
            'start_created_at',
            'end_created_at',
            'start_updated_at',
            'end_updated_at',
            'start_deleted_at',
            'end_deleted_at',
            'row',
        ]);

        $this->reset([
            'activity',
            'log_name',
            'description',
            'subject_type',
            'event',
            'subject_id',
            'causer_type',
            'causer_id',
            'properties',
            'batch_uuid',
            'user_id',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function resetForm()
    {
        if ($this->activity) {
        }

        $this->alert('info', trans('index.reset_form'));
    }

    public function refresh()
    {
        $this->resetValidation();
        $this->alert('info', trans('index.refresh'));
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

    public function mount()
    {
    }

    public function getActivityLogNames()
    {
        return Activity::whereNotNull('log_name')->groupBy('log_name')->orderBy('log_name')->pluck('log_name');
    }

    public function getActivityEvents()
    {
        return Activity::whereNotNull('event')->groupBy('event')->orderBy('event')->pluck('event');
    }

    public function getActivitySubjectTypes()
    {
        return Activity::whereNotNull('subject_type')->groupBy('subject_type')->orderBy('subject_type')->pluck('subject_type');
    }

    public function getActivityCauserType()
    {
        return Activity::whereNotNull('causer_type')->groupBy('causer_type')->orderBy('causer_type')->pluck('causer_type');
    }

    public function getUsers()
    {
        return User::active()->orderBy('name')->get();
    }

    public function getActivities()
    {
        return Activity::with('subject', 'causer')
            ->when($this->log_name, fn ($q) => $q->where('log_name', $this->log_name))
            ->when($this->description, fn ($q) => $q->where('description', 'LIKE', "%{$this->description}%"))
            ->when($this->event, fn ($q) => $q->where('event', $this->event))
            ->when($this->subject_type, fn ($q) => $q->where('subject_type', $this->subject_type))
            ->when($this->subject_id, fn ($q) => $q->where('subject_id', 'LIKE', "%{$this->subject_id}%"))
            ->when($this->causer_type, fn ($q) => $q->where('causer_type', $this->causer_type))
            ->when($this->causer_id, fn ($q) => $q->where('causer_id', 'LIKE', "%{$this->causer_id}%"))
            ->when($this->user_id, fn ($q) => $q->where('causer_id', $this->user_id))
            ->when($this->properties, fn ($q) => $q->where('properties', 'LIKE', "%{$this->properties}%"))
            ->when($this->batch_uuid, fn ($q) => $q->where('batch_uuid', 'LIKE', "%{$this->batch_uuid}%"))
            ->latest()
            ->orderBy($this->order_by ?? 'id', $this->sort_by ?? 'desc')
            ->paginate($this->per_page ?? 10);
    }

    public function getSummary()
    {
        $today = Activity::whereDate('created_at', now());
        $yesterday = Activity::whereDate('created_at', now()->subDay());

        $month = Activity::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'));
        $lastMonth = Activity::whereMonth('created_at', now()->subMonth()->format('m'))->whereYear('created_at', now()->subMonth()->format('Y'));

        $year = Activity::whereYear('created_at', now()->format('Y'));
        $lastYear = Activity::whereYear('created_at', now()->subYear()->format('Y'));

        $all = Activity::query();
        $beforeThisYear = Activity::whereYear('created_at', '<', now()->format('Y'));

        $todayCount = $today->count();
        $yesterdayCount = $yesterday->count();
        $todayCountPercentage = $todayCount && $yesterdayCount ? (($todayCount - $yesterdayCount) / $yesterdayCount) * 100 : 0;

        $monthCount = $month->count();
        $lastMonthCount = $lastMonth->count();
        $monthCountPercentage = $monthCount && $lastMonthCount ? (($monthCount - $lastMonthCount) / $lastMonthCount) * 100 : 0;

        $yearCount = $year->count();
        $lastYearCount = $lastYear->count();
        $yearCountPercentage = $yearCount && $lastYearCount ? (($yearCount - $lastYearCount) / $lastYearCount) * 100 : 0;

        $allCount = $all->count();
        $beforeThisYearCount = $beforeThisYear->count();
        $allCountPercentage = $allCount && $beforeThisYearCount ? (($allCount - $beforeThisYearCount) / $beforeThisYearCount) * 100 : 0;

        return collect([
            'todayCount' => $todayCount,
            'yesterdayCount' => $yesterdayCount,
            'todayCountPercentage' => $todayCountPercentage,
            'monthCount' => $monthCount,
            'lastMonthCount' => $lastMonthCount,
            'monthCountPercentage' => $monthCountPercentage,
            'yearCount' => $yearCount,
            'lastYearCount' => $lastYearCount,
            'yearCountPercentage' => $yearCountPercentage,
            'allCount' => $allCount,
            'beforeThisYearCount' => $beforeThisYearCount,
            'allCountPercentage' => $allCountPercentage,
        ]);
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.index", [
            'activityLogNames' => $this->readyToLoad ? $this->getActivityLogNames() : collect(),
            'activityEvents' => $this->readyToLoad ? $this->getActivityEvents() : collect(),
            'activitySubjectTypes' => $this->readyToLoad ? $this->getActivitySubjectTypes() : collect(),
            'activityCauserTypes' => $this->readyToLoad ? $this->getActivityCauserType() : collect(),
            'users' => $this->readyToLoad ? $this->getUsers() : collect(),
            'activities' => $this->readyToLoad ? $this->getActivities() : collect(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
