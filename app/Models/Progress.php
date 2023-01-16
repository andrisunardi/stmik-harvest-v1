<?php

namespace App\Models;

use App\Enums\ProgressStatus;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Progress
 *
 * @property ProgressStatus $status
 * @property-read \App\Models\User $createdBy
 * @property-read \App\Models\User $deletedBy
 * @property-read \App\Models\Portfolio $portfolio
 * @property-read \App\Models\User $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Progress active()
 * @method static \Illuminate\Database\Eloquent\Builder|Progress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Progress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Progress inActive()
 * @method static \Illuminate\Database\Query\Builder|Progress onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Progress query()
 * @method static \Illuminate\Database\Query\Builder|Progress withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Progress withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $portfolio_id
 * @property int|null $number
 * @property string|null $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress wherePortfolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Progress whereUpdatedById($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Progress extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'progresses';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['progresses'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'portfolio_id' => 'integer',
        'number' => 'integer',
        'status' => ProgressStatus::class,
        'name' => 'string',
        'description' => 'string',
        'datetime' => 'datetime',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'portfolio_id',
        'number',
        'status',
        'name',
        'description',
        'datetime',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}");
    }

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInActive($query)
    {
        return $query->where('is_active', false);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by_id', 'id');
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
