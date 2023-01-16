<?php

namespace App\Models;

use App\Enums\PortfolioStatus;
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
 * App\Models\Portfolio
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $portfolio_category_id
 * @property int|null $user_id
 * @property string|null $username_cpanel
 * @property string|null $password_cpanel
 * @property PortfolioStatus|null $status
 * @property string|null $name
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $link
 * @property int|null $price
 * @property string|null $logo
 * @property string|null $image_1
 * @property string|null $image_2
 * @property string|null $image_3
 * @property string|null $image_4
 * @property string|null $image_5
 * @property string|null $testimonial
 * @property string|null $source_testimonial
 * @property \Illuminate\Support\Carbon|null $expired
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property string|null $notes
 * @property bool|null $is_publish
 * @property bool|null $is_active
 * @property string|null $slug
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BuyDomainHosting[] $buyDomainHostings
 * @property-read int|null $buy_domain_hostings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Charge[] $charges
 * @property-read int|null $charges_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $domain
 * @property-read mixed $logo_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \App\Models\BuyDomainHosting|null $lastBuyDomainHosting
 * @property-read \App\Models\Charge|null $lastCharge
 * @property-read \App\Models\Loyalty|null $lastLoyalty
 * @property-read \App\Models\Payment|null $lastPayment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Loyalty[] $loyalties
 * @property-read int|null $loyalties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\PortfolioCategory|null $portfolioCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioDislike[] $portfolioDislike
 * @property-read int|null $portfolio_dislike_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioImage[] $portfolioImages
 * @property-read int|null $portfolio_images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioLike[] $portfolioLikes
 * @property-read int|null $portfolio_likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Progress[] $progresses
 * @property-read int|null $progresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Revision[] $revisions
 * @property-read int|null $revisions_count
 * @property-read \App\Models\User|null $updatedBy
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio active()
 * @method static \Database\Factories\PortfolioFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio inActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio nonPublish()
 * @method static \Illuminate\Database\Query\Builder|Portfolio onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio publish()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImage4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereImage5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereIsPublish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio wherePasswordCpanel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio wherePortfolioCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereSourceTestimonial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereTestimonial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Portfolio whereUsernameCpanel($value)
 * @method static \Illuminate\Database\Query\Builder|Portfolio withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Portfolio withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Portfolio extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'portfolios';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['portfolios'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'portfolio_category_id' => 'integer',
        'user_id' => 'integer',
        'username_cpanel' => 'string',
        'password_cpanel' => 'string',
        'status' => PortfolioStatus::class,
        'name' => 'string',
        'description' => 'string',
        'short_description' => 'string',
        'link' => 'string',
        'price' => 'integer',
        'logo' => 'string',
        'our_work' => 'string',
        'testimonial' => 'string',
        'source_testimonial' => 'string',
        'datetime' => 'datetime',
        'expired' => 'datetime',
        'notes' => 'string',
        'slug' => 'string',
        'is_publish' => 'boolean',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'portfolio_category_id',
        'user_id',
        'username_cpanel',
        'password_cpanel',
        'status',
        'name',
        'description',
        'short_description',
        'link',
        'price',
        'logo',
        'our_work',
        'testimonial',
        'source_testimonial',
        'datetime',
        'expired',
        'notes',
        'slug',
        'is_publish',
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

    public function scopePublish($query)
    {
        return $query->where('is_publish', true);
    }

    public function scopeNonPublish($query)
    {
        return $query->where('is_publish', false);
    }

    public function portfolioCategory()
    {
        return $this->belongsTo(PortfolioCategory::class);
    }

    public function portfolioImages()
    {
        return $this->hasMany(PortfolioImage::class)->active()->orderBy('id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buyDomainHostings()
    {
        return $this->hasMany(BuyDomainHosting::class)->active()->orderBy('id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->active()->orderBy('id');
    }

    public function charges()
    {
        return $this->hasMany(Charge::class)->active()->orderBy('id');
    }

    public function loyalties()
    {
        return $this->hasMany(Loyalty::class)->active()->orderBy('id');
    }

    public function portfolioLikes()
    {
        return $this->hasMany(PortfolioLike::class)->active()->orderBy('id');
    }

    public function portfolioDislike()
    {
        return $this->hasMany(PortfolioDislike::class)->active()->orderBy('id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class)->active()->orderBy('id');
    }

    public function revisions()
    {
        return $this->hasMany(Revision::class)->active()->orderBy('id');
    }

    public function lastPayment()
    {
        return $this->hasOne(Payment::class)->active()->orderByDesc('id');
    }

    public function lastCharge()
    {
        return $this->hasOne(Charge::class)->active()->orderByDesc('id');
    }

    public function lastLoyalty()
    {
        return $this->hasOne(Loyalty::class)->active()->orderByDesc('id');
    }

    public function lastBuyDomainHosting()
    {
        return $this->hasOne(BuyDomainHosting::class)->active()->orderByDesc('id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->active()->orderBy('id');
    }

    public function getDomainAttribute()
    {
        if ($this->link) {
            if (substr($this->link, 0, 5) == 'https') {
                return substr($this->link, 8);
            } elseif (substr($this->link, 0, 4) == 'http') {
                return substr($this->link, 7);
            } elseif (substr($this->link, 0, 5) == '//www') {
                return substr($this->link, 2);
            } elseif (substr($this->link, 0, 2) == '//') {
                return $this->link;
            }
        }

        return null;
    }

    public function altLogo()
    {
        return trans('index.logo').' - '.Str::translate($this->table)." - {$this->name} - ".env('APP_TITLE');
    }

    public function checkLogo()
    {
        if ($this->logo && File::exists(public_path("images/portfolio/logo/{$this->logo}"))) {
            return true;
        }
    }

    public function assetLogo()
    {
        if ($this->checkLogo()) {
            return asset("images/portfolio/logo/{$this->logo}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteLogo()
    {
        if ($this->checkLogo()) {
            File::delete(public_path("images/portfolio/logo/{$this->logo}"));
        }
    }

    public function getLogoUrlAttribute()
    {
        if ($this->checkLogo()) {
            return URL::to('/').'/images/'.Str::singular(Str::slug($this->table))."/logo/{$this->logo}";
        }

        return null;
    }

    protected $appends = ['logo_url'];
}
