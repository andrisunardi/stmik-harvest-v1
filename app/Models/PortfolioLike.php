<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\PortfolioLike
 *
 * @property int $id
 * @property int|null $portfolio_id
 * @property int|null $user_id
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Portfolio|null $portfolio
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike active()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike inActive()
 * @method static \Illuminate\Database\Query\Builder|PortfolioLike onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike wherePortfolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioLike whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|PortfolioLike withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PortfolioLike withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class PortfolioLike extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'portfolio_likes';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['portfolio_likes'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'portfolio_id' => 'integer',
        'user_id' => 'integer',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'portfolio_id',
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
