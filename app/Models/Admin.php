<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'admin';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['admin'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'access_id',
        'name',
        'email',
        'username',
        'password',
        'image',
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
        return $this->belongsTo(Admin::class, 'created_by', 'id')->withTrashed()->withDefault(null);
    }

    public function updated_by_admin()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id')->withTrashed()->withDefault(null);
    }

    public function deleted_by_admin()
    {
        return $this->belongsTo(Admin::class, 'deleted_by', 'id')->withTrashed()->withDefault(null);
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path('images/'.Str::slug($this->table)."/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset('images/'.Str::slug($this->table)."/{$this->image}");
        } else {
            return asset('images/'.Str::slug($this->table).'.png');
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path('images/'.Str::slug($this->table)."/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/').'/images/'.Str::slug($this->table)."/{$this->image}";
        }

        return null;
    }

    protected $appends = ['image_url'];

    public function access()
    {
        return $this->belongsTo(Access::class)->withTrashed()->withDefault(null);
    }

    public function data_log()
    {
        return $this->hasMany(Log::class)->orderBy('id');
    }
}
