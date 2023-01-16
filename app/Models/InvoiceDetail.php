<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\InvoiceDetail
 *
 * @property int $id
 * @property string|null $invoice_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $price
 * @property bool|null $is_active
 * @property int|null $created_by_id
 * @property int|null $updated_by_id
 * @property int|null $deleted_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\Invoice|null $invoice
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail active()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail inActive()
 * @method static \Illuminate\Database\Query\Builder|InvoiceDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereDeletedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceDetail whereUpdatedById($value)
 * @method static \Illuminate\Database\Query\Builder|InvoiceDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|InvoiceDetail withoutTrashed()
 *
 * @mixin \Eloquent
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
class InvoiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;

    // protected $connection = "mysql";

    // protected $dateFormat = "U";

    protected $table = 'invoice_details';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $guarded = ['invoice_details'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'invoice_id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'price' => 'integer',
        // 'is_active' => 'boolean',
    ];

    protected $fillable = [
        'invoice_id',
        'name',
        'description',
        'price',
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

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
