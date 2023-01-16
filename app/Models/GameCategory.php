<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\GameCategory
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Game[] $games
 * @property-read int|null $games_count
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory inActive()
 * @method static \Illuminate\Database\Query\Builder|GameCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GameCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|GameCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|GameCategory withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class GameCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'game_categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['game_categories'];

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

    public function games()
    {
        return $this->hasMany(Game::class)->active()->orderBy('id');
    }
}
