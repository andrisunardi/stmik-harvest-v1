<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'registration';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['registration'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'school',
        'major',
        'city',
        'type',
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

    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_by_id', 'id');
    }

    public function updated_by()
    {
        return $this->belongsTo(Admin::class, 'updated_by_id', 'id');
    }

    public function deleted_by()
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id', 'id');
    }

    public function getGenderTextAttribute()
    {
        if ($this->gender == 1) {
            return 'Man';
        } elseif ($this->gender == 2) {
            return 'Woman';
        } else {
            return null;
        }
    }

    public function getTypeTextAttribute()
    {
        if ($this->type == 1) {
            return 'Morning - Afternoon Lecturer';
        } elseif ($this->type == 2) {
            return 'Study & Work (Evening Lecture)';
        } else {
            return null;
        }
    }
}
