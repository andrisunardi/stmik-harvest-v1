<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class Lecturer extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "lecturer";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["lecturer"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "code",
        "name",
        "description",
        "job",
        "phone",
        "email",
        "facebook",
        "twitter",
        "instagram",
        "linkedin",
        "scholar",
        "image",
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
            return asset("images/" . Str::slug($this->table) . ".png");
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

    protected $appends = ["image_url"];

    public function data_course_lecturer()
    {
        return $this->hasMany(CourseLecturer::class)->orderBy("id");
    }

    public function data_lecturer_education()
    {
        return $this->hasMany(LecturerEducation::class)->orderBy("id");
    }

    public function data_lecturer_work_experience()
    {
        return $this->hasMany(LecturerWorkExperience::class)->orderBy("id");
    }

    public function data_repository_contributor()
    {
        return $this->hasMany(RepositoryContributor::class)->orderBy("id");
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            $table->data_course_lecturer()->delete();
            $table->data_lecturer_education()->delete();
            $table->data_work_experience()->delete();
            $table->data_repository_contributor()->delete();
        });

        static::restored(function ($table) {
            $table->data_course_lecturer()->restore();
            $table->data_lecturer_education()->restore();
            $table->data_work_experience()->restore();
            $table->data_repository_contributor()->restore();
        });
    }
}
