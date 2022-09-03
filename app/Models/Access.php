<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Access
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AccessMenu[] $data_access_menu
 * @property-read int|null $data_access_menu_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin[] $data_admin
 * @property-read int|null $data_admin_count
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Access active()
 * @method static \Database\Factories\AccessFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Access newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Access newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Access nonActive()
 * @method static \Illuminate\Database\Query\Builder|Access onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Access query()
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Access whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Access withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Access withoutTrashed()
 * @mixin \Eloquent
 */
class Access extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'access';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['access'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'active',
    ];

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeNonActive($query)
    {
        return $query->where('active', false);
    }

    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_by_id', 'id');
    }

    public function updated_by()
    {
        return $this->belongsTo(Admin::class, 'updated_by_id', 'id');
    }

    public function deleted_by()
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id', 'id');
    }

    public function data_access_menu()
    {
        return $this->hasMany(AccessMenu::class)->active()->orderBy('id');
    }

    public function data_admin()
    {
        return $this->hasMany(Admin::class)->active()->orderBy('name');
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            $table->data_access_menu()->delete();
            $table->data_admin()->delete();
        });

        static::restored(function ($table) {
            $table->data_admin()->restore();
            $table->data_access_menu()->restore();
        });
    }
}
