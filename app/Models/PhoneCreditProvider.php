<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\PhoneCreditProvider
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyPhoneCredit[] $data_buy_phone_credit
 * @property-read int|null $data_buy_phone_credit_count
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider active()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider inActive()
 * @method static \Illuminate\Database\Query\Builder|PhoneCreditProvider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCreditProvider whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|PhoneCreditProvider withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PhoneCreditProvider withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\PhoneCreditProviderFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyPhoneCredit[] $buyPhoneCredits
 * @property-read int|null $buy_phone_credits_count
 */
class PhoneCreditProvider extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'phone_credit_providers';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['phone_credit_providers'];

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

    public function buyPhoneCredits()
    {
        return $this->hasMany(BuyPhoneCredit::class)->active()->orderBy('id');
    }
}
