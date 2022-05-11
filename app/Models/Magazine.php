<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class Magazine extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "magazine";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["magazine"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "name",
        "name_id",
        "description",
        "description_id",
        "image",
        "file",
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

    public function getTranslateNameAttribute()
    {
        return Session::get("locale") == "en" ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return Session::get("locale") == "en" ? $this->description : $this->description_id;
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path() . "/images/" . Str::slug($this->table) . "/{$this->image}")) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/" . Str::slug($this->table) . "/{$this->image}");
        } else {
            return asset("images/image-not-available.png");
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path() . "/images/" . Str::slug($this->table) . "/{$this->image}");
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to("/") . "/images/" . Str::slug($this->table) . "/{$this->image}";
        }

        return null;
    }

    public function checkFile()
    {
        if ($this->file && File::exists(public_path() . "/files/" . Str::slug($this->table) . "/{$this->file}")) {
            return true;
        }
    }

    public function assetFile()
    {
        if ($this->checkFile()) {
            return asset("files/" . Str::slug($this->table) . "/{$this->file}");
        } else {
            return asset("files/file-not-available.png");
        }
    }

    public function deleteFile()
    {
        if ($this->checkFile()) {
            File::delete(public_path() . "/files/" . Str::slug($this->table) . "/{$this->file}");
        }
    }

    public function getFileUrlAttribute()
    {
        if ($this->checkFile()) {
            return URL::to("/") . "/files/" . Str::slug($this->table) . "/{$this->file}";
        }

        return null;
    }

    protected $appends = ["image_url", "file_url"];
}
