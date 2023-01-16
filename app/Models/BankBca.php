<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BankBca
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $notes
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca active()
 * @method static \Database\Factories\BankBcaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca inActive()
 * @method static \Illuminate\Database\Query\Builder|BankBca onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankBca whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BankBca withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BankBca withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $file_url
 */
class BankBca extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    public $slug = 'bank-bca';

    protected $table = 'bank_bcas';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['bank_bcas'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'name' => 'string',
        'file' => 'string',
        'date' => 'date',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'name',
        'file',
        'date',
        'notes',
        'is_active',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->setDescriptionForEvent(fn (string $eventName) => "This model has been {$eventName}");
    }

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInActive($query)
    {
        return $query->where('is_active', false);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id', 'id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by_id', 'id');
    }

    public function altFile()
    {
        return trans('index.file').' - '.trans('index.'.Str::singular($this->table)).' - '.env('APP_TITLE');
    }

    public function checkFile()
    {
        if ($this->file && File::exists(public_path("files/{$this->slug}/{$this->file}"))) {
            return true;
        }
    }

    public function assetFile()
    {
        if ($this->checkFile()) {
            return asset("files/{$this->slug}/{$this->file}");
        } else {
            return asset('files/file-not-available.pdf');
        }
    }

    public function deleteFile()
    {
        if ($this->checkFile()) {
            File::delete(public_path("files/{$this->slug}/{$this->file}"));
        }
    }

    public function getFileUrlAttribute()
    {
        if ($this->checkFile()) {
            return URL::to('/')."/files/{$this->slug}/{$this->file}";
        }

        return null;
    }

    protected $appends = ['file_url'];
}
