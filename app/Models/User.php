<?php

namespace App\Models;

use DateTimeInterface;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $portfolio_id
 * @property int|null $access_id
 * @property int|null $platform_id
 * @property int|null $referral_id
 * @property string|null $name
 * @property int|null $level
 * @property int|null $exp
 * @property int|null $status
 * @property string|null $identity_card
 * @property int|null $gender
 * @property string|null $birthday_at
 * @property string|null $birthday
 * @property string|null $biography
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $line
 * @property string|null $whatsapp
 * @property string|null $position
 * @property string|null $company
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $google
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $tumblr
 * @property string|null $pinterest
 * @property string|null $linkedin
 * @property int|null $bank_id
 * @property string|null $account_number
 * @property string|null $account_name
 * @property string|null $email
 * @property string|null $username
 * @property string|null $password
 * @property string|null $image
 * @property string|null $notes
 * @property string|null $slug
 * @property string|null $ip
 * @property string|null $join_date
 * @property int|null $is_online
 * @property int|null $is_resign
 * @property int|null $is_newsletter
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $phone_verified_at
 * @property string|null $identity_card_verified_at
 * @property int|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Absent[] $absents
 * @property-read int|null $absents_count
 * @property-read \App\Models\Access|null $access
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Assignment[] $assignments
 * @property-read int|null $assignments_count
 * @property-read \App\Models\Bank|null $bank
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Charge[] $charges
 * @property-read int|null $charges_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Forum[] $forums
 * @property-read int|null $forums_count
 * @property-read mixed $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Loyalty[] $loyalties
 * @property-read int|null $loyalties_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Platform|null $platform
 * @property-read \App\Models\Portfolio|null $portfolio
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioDislike[] $portfolioDislike
 * @property-read int|null $portfolio_dislike_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioLike[] $portfolioLike
 * @property-read int|null $portfolio_like_count
 * @property-read User|null $referral
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RegisterInfluencer[] $registerInfluencers
 * @property-read int|null $register_influencers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Revision[] $revisions
 * @property-read int|null $revisions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Salary[] $salaries
 * @property-read int|null $salaries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User inActive()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthdayAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentityCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdentityCardVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsNewsletter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsResign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePinterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePortfolioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTumblr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereYoutube($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use LogsActivity;

    // public $connection = "mysql";

    // public $dateFormat = "U";

    public $table = 'users';

    public $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    public $guarded = ['users'];

    public $dates = ['deleted_at'];

    public $casts = [
        'name' => 'string',
        'username' => 'string',
        'password' => 'string',
        'email_verified_at' => 'datetime',
    ];

    public $hidden = [
        'password',
        'remember_token',
    ];

    public $fillable = [
        'code',
        'portfolio_id',
        'access_id',
        'platform_id',
        'referral_id',
        'name',
        'level',
        'exp',
        'status',
        'identity_card',
        'gender',
        'birthday_at',
        'birthday',
        'biography',
        'phone',
        'address',
        'line',
        'whatsapp',
        'position',
        'company',
        'website',
        'email',
        'username',
        'password',
        'facebook',
        'twitter',
        'google',
        'instagram',
        'youtube',
        'tumblr',
        'pinterest',
        'linkedin',
        'bank_id',
        'account_number',
        'account_name',
        'image',
        'notes',
        'slug',
        'ip',
        'join_date',
        'is_online',
        'is_resign',
        'is_newsletter',
        'email_verified_at',
        'phone_verified_at',
        'identity_card_verified_at',
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

    public function access()
    {
        return $this->belongsTo(Access::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    public function referral()
    {
        return $this->belongsTo(User::class, 'referral_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function absents()
    {
        return $this->hasMany(Absent::class)->orderBy('id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class)->orderBy('id');
    }

    public function charges()
    {
        return $this->hasMany(Charge::class)->orderBy('id');
    }

    public function portfolioDislike()
    {
        return $this->hasMany(PortfolioDislike::class)->orderBy('id');
    }

    public function forums()
    {
        return $this->hasMany(Forum::class)->orderBy('id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class)->orderBy('id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('id');
    }

    public function portfolioLike()
    {
        return $this->hasMany(PortfolioLike::class)->orderBy('id');
    }

    public function loyalties()
    {
        return $this->hasMany(Loyalty::class)->orderBy('id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('id');
    }

    public function registerInfluencers()
    {
        return $this->hasMany(RegisterInfluencer::class)->orderBy('id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class)->orderBy('id');
    }

    public function revisions()
    {
        return $this->hasMany(Revision::class)->orderBy('id');
    }

    public function altImage()
    {
        return trans('index.image').' - '.Str::translate($this->table)." - {$this->name} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path('images/'.Str::singular(Str::slug($this->table))."/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset('images/'.Str::singular(Str::slug($this->table))."/{$this->image}");
        }

        return asset('images/'.Str::singular(Str::slug($this->table)).'.png');
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path('images/'.Str::singular(Str::slug($this->table))."/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/').'/images/'.Str::singular(Str::slug($this->table))."/{$this->image}";
        }

        return null;
    }

    public $appends = ['image_url'];
}
