<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Revision
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $portfolio_id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $datetime
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
 * @method static \Illuminate\Database\Eloquent\Builder|Revision active()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision inActive()
 * @method static \Illuminate\Database\Query\Builder|Revision onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision query()
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision wherePortfolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Revision whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Revision withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Revision withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Revision extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'revisions';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['revisions'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'portfolio_id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'file' => 'string',
        'datetime' => 'datetime',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'portfolio_id',
        'user_id',
        'name',
        'description',
        'file',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
