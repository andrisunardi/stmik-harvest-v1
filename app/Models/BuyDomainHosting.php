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
 * App\Models\BuyDomainHosting
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $portfolio_id
 * @property int|null $domain_hosting_provider_id
 * @property int|null $payment_id
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
 * @property-read \App\Models\DomainHostingProvider|null $domainHostingProvider
 * @property-read \App\Models\Payment|null $payment
 * @property-read \App\Models\Portfolio|null $portfolio
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting active()
 * @method static \Database\Factories\BuyDomainHostingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting inActive()
 * @method static \Illuminate\Database\Query\Builder|BuyDomainHosting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting query()
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereDomainHostingProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting wherePortfolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BuyDomainHosting whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BuyDomainHosting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BuyDomainHosting withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $image_url
 */
class BuyDomainHosting extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    public $slug = 'buy-domain-hosting';

    protected $table = 'buy_domain_hostings';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['buy_domain_hostings'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'portfolio_id' => 'integer',
        'domain_hosting_provider_id' => 'integer',
        'payment_id' => 'integer',
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
        'portfolio_id',
        'domain_hosting_provider_id',
        'payment_id',
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

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function domainHostingProvider()
    {
        return $this->belongsTo(DomainHostingProvider::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
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
