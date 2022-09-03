<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Log
 *
 * @property int $id
 * @property int|null $admin_id
 * @property int|null $menu_id
 * @property int|null $row
 * @property int|null $activity 1 = Created, 2 = Updated, 3 = Deleted, 4 = Restored, 5 = Deleted Permanent
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read mixed $activity_icon
 * @property-read mixed $activity_text
 * @property-read \App\Models\Menu|null $menu
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Log active()
 * @method static \Database\Factories\LogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log nonActive()
 * @method static \Illuminate\Database\Query\Builder|Log onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereRow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|Log withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Log withoutTrashed()
 * @mixin \Eloquent
 */
class Log extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'log';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['log'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'admin_id',
        'menu_id',
        'activity',
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

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getActivityTextAttribute()
    {
        if ($this->activity == 1) {
            return 'Created';
        } elseif ($this->activity == 2) {
            return 'Updated';
        } elseif ($this->activity == 3) {
            return 'Deleted';
        } elseif ($this->activity == 4) {
            return 'Restored';
        } elseif ($this->activity == 5) {
            return 'Deleted Permanent';
        } else {
            return null;
        }
    }

    public function getActivityIconAttribute()
    {
        if ($this->activity == 1) {
            return 'bi bi-plus-lg';
        } elseif ($this->activity == 2) {
            return 'bi bi-pencil';
        } elseif ($this->activity == 3) {
            return 'bi bi-trash';
        } elseif ($this->activity == 4) {
            return 'bi bi-recycle';
        } elseif ($this->activity == 5) {
            return 'bi bi-trash2';
        } else {
            return null;
        }
    }
}
