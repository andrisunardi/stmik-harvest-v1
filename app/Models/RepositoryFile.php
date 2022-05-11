<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class RepositoryFile extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "repository_file";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["repository_file"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "repository_id",
        "name",
        "description",
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

    public function checkFile()
    {
        if ($this->file && File::exists(public_path() . "/files/repository/{$this->repository?->slug}/{$this->file}")) {
            return true;
        }
    }

    public function assetFile()
    {
        if ($this->checkFile()) {
            return asset("files/repository/{$this->repository?->slug}/{$this->file}");
        } else {
            return asset("files/file-not-available.pdf");
        }
    }

    public function deleteFile()
    {
        if ($this->checkFile()) {
            File::delete(public_path() . "/files/repository/{$this->repository?->slug}/{$this->file}");
        }
    }

    public function formatBytesFile()
    {
        if ($this->checkFile()) {
            return Str::formatBytes(File::size(public_path() . "/files/repository/{$this->repository?->slug}/{$this->file}"));
        } else {
            return "0 kB";
        }
    }

    public function getFileUrlAttribute()
    {
        if ($this->checkFile()) {
            return URL::to("/") . "/files/repository/{$this->repository?->slug}/{$this->file}";
        }

        return null;
    }

    protected $appends = ["file_url"];

    public function repository()
    {
        return $this->belongsTo(Repository::class)->withTrashed()->withDefault(null);
    }
}
