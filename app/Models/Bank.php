<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Bank
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdministrativeCost[] $administrativeCosts
 * @property-read int|null $administrative_costs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BankInterest[] $bankInterests
 * @property-read int|null $bank_interests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyAdvertisement[] $buyAdvertisements
 * @property-read int|null $buy_advertisements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyDomainHosting[] $buyDomainHostings
 * @property-read int|null $buy_domain_hostings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyEndorse[] $buyEndorses
 * @property-read int|null $buy_endorses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyInternet[] $buyInternets
 * @property-read int|null $buy_internets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyItem[] $buyItems
 * @property-read int|null $buy_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyPhoneCredit[] $buyPhoneCredits
 * @property-read int|null $buy_phone_credits_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GoogleAdsense[] $googleAdsenses
 * @property-read int|null $google_adsenses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Loyalty[] $loyalties
 * @property-read int|null $loyalties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Salary[] $salaries
 * @property-read int|null $salaries_count
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Bank active()
 * @method static \Database\Factories\BankFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank inActive()
 * @method static \Illuminate\Database\Query\Builder|Bank onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Bank withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bank withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Bank extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'banks';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['banks'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
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

    public function administrativeCosts()
    {
        return $this->hasMany(AdministrativeCost::class)->active()->orderBy('id');
    }

    public function bankInterests()
    {
        return $this->hasMany(BankInterest::class)->active()->orderBy('id');
    }

    public function buyAdvertisements()
    {
        return $this->hasMany(BuyAdvertisement::class)->active()->orderBy('id');
    }

    public function buyDomainHostings()
    {
        return $this->hasMany(BuyDomainHosting::class)->active()->orderBy('id');
    }

    public function buyEndorses()
    {
        return $this->hasMany(BuyEndorse::class)->active()->orderBy('id');
    }

    public function buyInternets()
    {
        return $this->hasMany(BuyInternet::class)->active()->orderBy('id');
    }

    public function buyItems()
    {
        return $this->hasMany(BuyItem::class)->active()->orderBy('id');
    }

    public function buyPhoneCredits()
    {
        return $this->hasMany(BuyPhoneCredit::class)->active()->orderBy('id');
    }

    public function googleAdsenses()
    {
        return $this->hasMany(GoogleAdsense::class)->active()->orderBy('id');
    }

    public function loyalties()
    {
        return $this->hasMany(Loyalty::class)->active()->orderBy('id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->active()->orderBy('id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class)->active()->orderBy('id');
    }

    public function users()
    {
        return $this->hasMany(User::class)->active()->orderBy('name');
    }
}
