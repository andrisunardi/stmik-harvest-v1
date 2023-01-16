<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Forum
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $forum_category_id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\ForumCategory|null $forumCategory
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Forum active()
 * @method static \Illuminate\Database\Eloquent\Builder|Forum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Forum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Forum inActive()
 * @method static \Illuminate\Database\Query\Builder|Forum onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Forum query()
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereForumCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forum whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Forum withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Forum withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Forum extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'forums';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['forums'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'forum_category_id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'image' => 'string',
        'datetime' => 'datetime',
        'slug' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'forum_category_id',
        'user_id',
        'name',
        'description',
        'image',
        'datetime',
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

    public function forumCategory()
    {
        return $this->belongsTo(ForumCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
