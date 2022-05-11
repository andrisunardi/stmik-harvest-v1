<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "setting";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["setting"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "sms",
        "call",
        "fax",
        "whatsapp",
        "email",
        "address",
        "google_maps",
        "google_maps_iframe",
        "active",
    ];

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format("Y-m-d H:i:s");
    }

    public function scopeOnlyActive($query)
    {
        return $query->where("active", true);
    }

    public function scopeOnlyNonActive($query)
    {
        return $query->where("active", false);
    }

    public function created_by_admin()
    {
        return $this->belongsTo(Admin::class, "created_by", "id")->withTrashed()->withDefault(null);
    }

    public function updated_by_admin()
    {
        return $this->belongsTo(Admin::class, "updated_by", "id")->withTrashed()->withDefault(null);
    }

    public function deleted_by_admin()
    {
        return $this->belongsTo(Admin::class, "deleted_by", "id")->withTrashed()->withDefault(null);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? URL::to("/") . "/images/" . Str::slug($this->table) . "/{$this->image}" : null;
    }

    protected $appends = ["image_url"];
}
