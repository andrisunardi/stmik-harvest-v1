<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $payment_category_id
 * @property int|null $portfolio_id
 * @property int|null $user_id
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
 * @property-read \App\Models\BuyDomainHosting|null $buy_domain_hosting
 * @property-read \App\Models\Charge|null $charge
 * @property-read \App\Models\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyDomainHosting[] $data_buy_domain_hosting
 * @property-read int|null $data_buy_domain_hosting_count
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\PaymentCategory|null $payment_category
 * @property-read \App\Models\Portfolio|null $portfolio
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Payment active()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment inActive()
 * @method static \Illuminate\Database\Query\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePortfolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Payment withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\BuyDomainHosting|null $buyDomainHosting
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyDomainHosting[] $buyDomainHostings
 * @property-read int|null $buy_domain_hostings_count
 * @property-read mixed $image_url
 * @property-read \App\Models\PaymentCategory|null $paymentCategory
 */
class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    public $slug = 'payment';

    protected $table = 'payments';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['payments'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'payment_category_id' => 'integer',
        'portfolio_id' => 'integer',
        'user_id' => 'integer',
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
        'payment_category_id',
        'portfolio_id',
        'user_id',
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

    public function paymentCategory()
    {
        return $this->belongsTo(PaymentCategory::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function buyDomainHostings()
    {
        return $this->hasMany(BuyDomainHosting::class)->active()->orderBy('id');
    }

    public function buyDomainHosting()
    {
        return $this->hasOne(BuyDomainHosting::class)->active()->orderBy('id');
    }

    public function charge()
    {
        return $this->hasOne(Charge::class)->active()->orderBy('id');
    }

    public function altImage()
    {
        return trans('index.image').' - '.trans('index.'.Str::singular($this->table)).' - '.env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path("images/{$this->slug}/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/{$this->slug}/{$this->image}");
        } else {
            return asset('images/image-not-available.pdf');
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/{$this->slug}/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/{$this->slug}/{$this->image}";
        }

        return null;
    }

    protected $appends = ['image_url'];
}
