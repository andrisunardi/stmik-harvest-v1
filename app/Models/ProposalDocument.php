<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\ProposalDocument
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_idn
 * @property string|null $description
 * @property string|null $description_idn
 * @property string|null $image
 * @property string|null $file
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $file_url
 * @property-read mixed $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument active()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument inActive()
 * @method static \Illuminate\Database\Query\Builder|ProposalDocument onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereDescriptionIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereNameIdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProposalDocument whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|ProposalDocument withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProposalDocument withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class ProposalDocument extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'proposal_documents';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['proposal_documents'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'name' => 'string',
        'name_idn' => 'string',
        'description' => 'string',
        'description_idn' => 'string',
        'image' => 'string',
        'file' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'name_idn',
        'description',
        'description_idn',
        'image',
        'file',
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

    public function getTranslateNameAttribute()
    {
        return App::isLocale('en') ? $this->name : $this->name_idn;
    }

    public function getTranslateDescriptionAttribute()
    {
        return App::isLocale('en') ? $this->description : $this->description_idn;
    }

    public function altImage()
    {
        return trans('index.image').' - '.Str::translate($this->table)." - {$this->name} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path('images/'.Str::singular(Str::slug($this->table))."/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset('images/'.Str::singular(Str::slug($this->table))."/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path('images/'.Str::singular(Str::slug($this->table))."/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/').'/images/'.Str::singular(Str::slug($this->table))."/{$this->image}";
        }

        return null;
    }

    public function altFile()
    {
        return trans('index.file').' - '.Str::translate($this->table)." - {$this->name} - ".env('APP_TITLE');
    }

    public function checkFile()
    {
        if ($this->file && File::exists(public_path('files/'.Str::singular(Str::slug($this->table))."/{$this->file}"))) {
            return true;
        }
    }

    public function assetFile()
    {
        if ($this->checkFile()) {
            return asset('files/'.Str::singular(Str::slug($this->table))."/{$this->file}");
        }

        return asset('files/file-not-available.png');
    }

    public function deleteFile()
    {
        if ($this->checkFile()) {
            File::delete(public_path('files/'.Str::singular(Str::slug($this->table))."/{$this->file}"));
        }
    }

    public function getFileUrlAttribute()
    {
        if ($this->checkFile()) {
            return URL::to('/').'/files/'.Str::singular(Str::slug($this->table))."/{$this->file}";
        }

        return null;
    }

    protected $appends = ['image_url', 'file_url'];
}
