<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\AccessMenu
 *
 * @property int $id
 * @property int|null $access_id
 * @property int|null $menu_id
 * @property int|null $view 1 = Yes, 0 = No
 * @property int|null $add 1 = Yes, 0 = No
 * @property int|null $edit 1 = Yes, 0 = No
 * @property int|null $delete 1 = Yes, 0 = No
 * @property int|null $active 1 = Yes, 0 = No
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Access|null $access
 * @property-read \App\Models\Admin|null $created_by
 * @property-read \App\Models\Admin|null $deleted_by
 * @property-read \App\Models\Menu|null $menu
 * @property-read \App\Models\Admin|null $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu active()
 * @method static \Database\Factories\AccessMenuFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu nonActive()
 * @method static \Illuminate\Database\Query\Builder|AccessMenu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereAccessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereAdd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereDelete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereEdit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessMenu whereView($value)
 * @method static \Illuminate\Database\Query\Builder|AccessMenu withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AccessMenu withoutTrashed()
 * @mixin \Eloquent
 */
class AccessMenu extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'access_menu';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['access_menu'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'access_id',
        'menu_id',
        'view',
        'add',
        'edit',
        'delete',
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

    public function access()
    {
        return $this->belongsTo(Access::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
