<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasRoles, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'user';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['user'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
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
}
