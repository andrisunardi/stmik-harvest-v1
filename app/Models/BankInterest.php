<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\BankInterest
 *
 * @property int $id
 * @property string|null $code
 * @property int|null $bank_id
 * @property int|null $amount
 * @property int|null $tax
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $notes
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest active()
 * @method static \Database\Factories\BankInterestFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest inActive()
 * @method static \Illuminate\Database\Query\Builder|BankInterest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankInterest whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|BankInterest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BankInterest withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read mixed $after_tax
 */
class BankInterest extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'bank_interests';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['bank_interests'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'code' => 'string',
        'bank_id' => 'integer',
        'amount' => 'integer',
        'tax' => 'integer',
        'date' => 'date',
        'notes' => 'string',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'code',
        'bank_id',
        'amount',
        'tax',
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

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function getAfterTaxAttribute()
    {
        return $this->amount - $this->tax;
    }
}
