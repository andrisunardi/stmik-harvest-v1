<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\DepositCategory
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property bool|null $is_active
 * @property string|null $slug
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Deposit[] $deposits
 * @property-read int|null $deposits_count
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory inActive()
 * @method static \Illuminate\Database\Query\Builder|DepositCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|DepositCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DepositCategory withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\DepositCategoryFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class DepositCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'deposit_categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['deposit_categories'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
        'description',
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

    public function deposits()
    {
        return $this->hasMany(Deposit::class)->active()->orderByDesc('id');
    }
}
