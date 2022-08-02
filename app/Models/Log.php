<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
