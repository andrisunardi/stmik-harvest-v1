<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\WithdrawCategory
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
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Withdraw[] $withdraws
 * @property-read int|null $withdraws_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory inActive()
 * @method static \Illuminate\Database\Query\Builder|WithdrawCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|WithdrawCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|WithdrawCategory withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class WithdrawCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'withdraw_categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['withdraw_categories'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'slug' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
        'description',
        'slug',
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

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class)->active()->orderByDesc('id');
    }
}
