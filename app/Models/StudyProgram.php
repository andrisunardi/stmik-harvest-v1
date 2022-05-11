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

class StudyProgram extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "study_program";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["study_program"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "study_program_category_id",
        "name",
        "name_id",
        "description",
        "description_id",
        "vision",
        "vision_id",
        "mission",
        "mission_id",
        "degree",
        "duration",
        "price",
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

    public function getTranslateStudyProgramAttribute()
    {
        return Session::get("locale") == "en" ?
            "{$this->study_program_category?->code} - {$this->name}" :
            "{$this->study_program_category?->code} - {$this->name_id}";
    }

    public function getTranslateNameAttribute()
    {
        return Session::get("locale") == "en" ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return Session::get("locale") == "en" ? $this->description : $this->description_id;
    }

    public function getTranslateVisionAttribute()
    {
        return Session::get("locale") == "en" ? $this->vision : $this->vision_id;
    }

    public function getTranslateMissionAttribute()
    {
        return Session::get("locale") == "en" ? $this->mission : $this->mission_id;
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

    protected $appends = ["image_url"];

    public function study_program_category()
    {
        return $this->belongsTo(StudyProgramCategory::class)->withTrashed()->withDefault(null);
    }

    public function total_course()
    {
        return $this->hasMany(Course::class)->sum("sks");
    }

    public function data_course()
    {
        return $this->hasMany(Course::class)->orderBy("id");
    }

    public function data_course_lecturer()
    {
        return $this->hasManyThrough(CourseLecturer::class, Course::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            foreach ($table->data_course as $news) {
                $news->data_course_lecturer()->delete();
            }
            $table->data_course()->delete();
        });

        static::restored(function ($table) {
            $table->data_course()->restore();
            foreach ($table->data_course as $news) {
                $news->data_course_lecturer()->restore();
            }
        });
    }
}
