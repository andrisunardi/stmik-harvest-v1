<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\RegisterInfluencer
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $user_id
 * @property string|null $instagram
 * @property string|null $public_account
 * @property string|null $follower
 * @property string|null $total_post
 * @property string|null $like
 * @property string|null $comment
 * @property string|null $follow_back
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property string|null $notes
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer active()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer inActive()
 * @method static \Illuminate\Database\Query\Builder|RegisterInfluencer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereFollowBack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereFollower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer wherePublicAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereTotalPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegisterInfluencer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|RegisterInfluencer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|RegisterInfluencer withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class RegisterInfluencer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'register_influencers';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['register_influencers'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'user_id' => 'integer',
        'instagram' => 'string',
        'public_account' => 'string',
        'follower' => 'string',
        'total_post' => 'string',
        'like' => 'string',
        'comment' => 'string',
        'follow_back' => 'string',
        'datetime' => 'datetime',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'user_id',
        'instagram',
        'public_account',
        'follower',
        'total_post',
        'like',
        'comment',
        'follow_back',
        'datetime',
        'notes',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
