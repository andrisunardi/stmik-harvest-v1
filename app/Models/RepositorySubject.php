<?php

namespace App\Models;

use DateTimeInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepositorySubject extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = "repository_subject";

    protected $primaryKey = "id";

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ["repository_subject"];

    protected $dates = ["deleted_at"];

    // protected $dateFormat = "U";

    protected $fillable = [
        "repository_subject_id",
        "name",
        "description",
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

    public function repository_subject()
    {
        return $this->belongsTo(RepositorySubject::class)->withTrashed()->withDefault(null);
    }

    public function data_repository_subject()
    {
        return $this->hasMany(RepositorySubject::class)->orderBy("id");
    }

    public function data_repository()
    {
        return $this->hasMany(Repository::class)->orderBy("id");
    }

    public function data_repository_contributor()
    {
        return $this->hasManyThrough(RepositoryContributor::class, Repository::class);
    }

    public function data_repository_file()
    {
        return $this->hasManyThrough(RepositoryFile::class, Repository::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($table) {
            foreach ($table->data_repository as $news) {
                $news->data_repository_contributor()->delete();
                $news->data_repository_file()->delete();
            }
            $table->data_repository()->delete();
        });

        static::restored(function ($table) {
            $table->data_repository()->restore();
            foreach ($table->data_repository as $news) {
                $news->data_repository_contributor()->restore();
                $news->data_repository_file()->restore();
            }
        });
    }
}
