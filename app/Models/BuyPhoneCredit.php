<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BuyPhoneCredit
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $phone_credit_provider_id
 * @property int|null $bank_id
 * @property string|null $account_number
 * @property string|null $account_name
 * @property int|null $amount
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property string|null $notes
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\PhoneCreditProvider|null $phoneCreditProvider
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit active()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit inActive()
 * @method static \Illuminate\Database\Query\Builder|BuyPhoneCredit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit wherePhoneCreditProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyPhoneCredit whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BuyPhoneCredit withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BuyPhoneCredit withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @method static \Database\Factories\BuyPhoneCreditFactory factory(...$parameters)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class BuyPhoneCredit extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'buy_phone_credits';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['buy_phone_credits'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'phone_credit_provider_id' => 'integer',
        'bank_id' => 'integer',
        'account_number' => 'string',
        'account_name' => 'string',
        'amount' => 'integer',
        'image' => 'string',
        'datetime' => 'datetime',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'phone_credit_provider_id',
        'bank_id',
        'account_number',
        'account_name',
        'amount',
        'image',
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

    public function phoneCreditProvider()
    {
        return $this->belongsTo(PhoneCreditProvider::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
