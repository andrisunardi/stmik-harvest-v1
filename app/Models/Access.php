<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function created_by_admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function updated_by_admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function deleted_by_admin()
    {
        return $this->belongsTo(Admin::class, 'deleted_by', 'id');
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
