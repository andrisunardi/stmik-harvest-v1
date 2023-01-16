<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\PaymentCategory
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $data_payment
 * @property-read int|null $data_payment_count
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory active()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory inActive()
 * @method static \Illuminate\Database\Query\Builder|PaymentCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|PaymentCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PaymentCategory withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 */
class PaymentCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'payment_categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['payment_categories'];

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

    public function payments()
    {
        return $this->hasMany(Payment::class)->active()->orderByDesc('id');
    }
}
