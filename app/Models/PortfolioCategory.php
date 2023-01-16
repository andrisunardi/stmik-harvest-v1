<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\PortfolioCategory
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $description
 * @property string|null $slug
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Portfolio[] $portfolios
 * @property-read int|null $portfolios_count
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory active()
 * @method static \Database\Factories\PortfolioCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory inActive()
 * @method static \Illuminate\Database\Query\Builder|PortfolioCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|PortfolioCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PortfolioCategory withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property string|null $name_idn
 * @property string|null $description_idn
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PortfolioCategory whereNameIdn($value)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class PortfolioCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'portfolio_categories';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['portfolio_categories'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'slug' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
        'name_idn',
        'description',
        'description_idn',
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class)->orderBy('id');
    }
}
