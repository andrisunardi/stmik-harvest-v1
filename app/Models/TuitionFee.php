<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class TuitionFee extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = "mysql";

    protected $table = 'tuition_fee';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['tuition_fee'];

    protected $dates = ['deleted_at'];

    // protected $dateFormat = "U";

    protected $fillable = [
        'name',
        'name_id',
        'description',
        'description_id',
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

    public function getTranslateNameAttribute()
    {
        return Session::get('locale') == 'en' ? $this->name : $this->name_id;
    }

    public function getTranslateDescriptionAttribute()
    {
        return Session::get('locale') == 'en' ? $this->description : $this->description_id;
    }
}
