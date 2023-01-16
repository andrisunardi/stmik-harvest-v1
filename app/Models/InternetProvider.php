<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\InternetProvider
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $link
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyInternet[] $buyInternets
 * @property-read int|null $buy_internets_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider active()
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider inActive()
 * @method static \Illuminate\Database\Query\Builder|InternetProvider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InternetProvider whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|InternetProvider withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InternetProvider withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\InternetProviderFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class InternetProvider extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'internet_providers';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['internet_providers'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'link' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
        'link',
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

    public function buyInternets()
    {
        return $this->hasMany(BuyInternet::class)->active()->orderBy('id');
    }
}
