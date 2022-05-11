<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class Repository extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "repository";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["repository"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "repository_subject_id",
        "study_program_id",
        "user_id",
        "status",
        "title",
        "journal_title",
        "date",
        "publication_date",
        "first_name",
        "last_name",
        "corporate_author",
        "publisher",
        "year",
        "abstract",
        "url",
        "keyword",
        "volume",
        "issue",
        "page",
        "first_page",
        "last_page",
        "scholar",
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

    public function getFullNameAttribute()
    {
        return $this->user ? $this->user?->name : "{$this->first_name} {$this->last_name}";
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

    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return "Pending";
        } else if ($this->status == 1) {
            return "Approved";
        } else if ($this->status == 2) {
            return "Rejected";
        } else {
            return null;
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
            return asset("files/file-not-available.pdf");
        }
    }

    public function deleteFile()
    {
        if ($this->checkFile()) {
            File::delete(public_path() . "/files/" . Str::slug($this->table) . "/{$this->file}");
        }
    }

    public function formatBytesFile()
    {
        if ($this->checkFile()) {
            return Str::formatBytes(File::size(public_path() . "/files/" . Str::slug($this->table) . "/{$this->file}"));
        } else {
            return "0 kB";
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

    public function data_keyword()
    {
        return explode(",", $this->keyword);
    }

    public function repository_subject()
    {
        return $this->belongsTo(RepositorySubject::class)->withTrashed()->withDefault(null);
    }

    public function study_program()
    {
        return $this->belongsTo(StudyProgram::class)->withTrashed()->withDefault(null);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed()->withDefault(null);
    }

    public function data_repository_contributor()
    {
        return $this->hasMany(RepositoryContributor::class)->orderBy("id");
    }

    public function data_repository_file()
    {
        return $this->hasMany(RepositoryFile::class)->orderBy("id");
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            $table->data_repository_file()->delete();
        });

        static::restored(function ($table) {
            $table->data_repository_file()->restore();
        });
    }
}
