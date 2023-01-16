<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $access_id
 * @property int|null $user_id
 * @property string|null $name
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
 * @property string|null $join_date
 * @property int|null $is_resign
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Forum[] $forums
 * @property-read int|null $forums_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Loyalty[] $loyalties
 * @property-read int|null $loyalties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioDislike[] $portfolioDislikes
 * @property-read int|null $portfolio_dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PortfolioLike[] $portfolioLikes
 * @property-read int|null $portfolio_likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RegisterInfluencer[] $registerInfluencers
 * @property-read int|null $register_influencers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Revision[] $revisions
 * @property-read int|null $revisions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Salary[] $salaries
 * @property-read int|null $salaries_count
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Employee active()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee inActive()
 * @method static \Illuminate\Database\Query\Builder|Employee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAccessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBirthdayAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIdentityCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIsResign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePinterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTumblr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereYoutube($value)
 * @method static \Illuminate\Database\Query\Builder|Employee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Employee withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'employees';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['employees'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'code',
        'portfolio_id',
        'access_id',
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
        'line',
        'whatsapp',
        'address',
        'position',
        'company',
        'website',
        'email',
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
        'online',
        'resign',
        'newsletter',
        'verification_email',
        'verification_phone',
        'verification_identity_card',
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

    public function access()
    {
        return $this->belongsTo(Access::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function absents()
    {
        return $this->hasMany(Absent::class)->active()->orderBy('id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class)->active()->orderBy('id');
    }

    public function charges()
    {
        return $this->hasMany(Charge::class)->active()->orderBy('id');
    }

    public function portfolioDislikes()
    {
        return $this->hasMany(PortfolioDislike::class)->active()->orderBy('id');
    }

    public function forums()
    {
        return $this->hasMany(Forum::class)->active()->orderBy('id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class)->active()->orderBy('id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->active()->orderBy('id');
    }

    public function portfolioLikes()
    {
        return $this->hasMany(PortfolioLike::class)->active()->orderBy('id');
    }

    public function loyalties()
    {
        return $this->hasMany(Loyalty::class)->active()->orderBy('id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class)->active()->orderBy('id');
    }

    public function registerInfluencers()
    {
        return $this->hasMany(RegisterInfluencer::class)->active()->orderBy('id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class)->active()->orderBy('id');
    }

    public function revisions()
    {
        return $this->hasMany(Revision::class)->active()->orderBy('id');
    }
}
