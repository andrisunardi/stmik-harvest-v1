<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PaymentService
{
    public $table = 'payments';

    public $slug = 'payment';

    public function add(array $data = []): Payment
    {
        $data['code'] = Str::code('PAYMENT', $this->table, $data['date'], 2);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Payment::create($data);
    }

    public function clone(array $data, Payment $payment): Payment
    {
        $data['code'] = Str::code('PAYMENT', $this->table, $data['date'], 2);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($payment->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $payment->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$payment->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Payment::create($data);
    }

    public function edit(Payment $payment, $data): Payment
    {
        if ($payment->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('PAYMENT', $this->table, $data['date'], 2);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $payment->deleteImage();

            $data['image'] = "{$payment->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $payment->update($data);
        $payment->refresh();

        return $payment;
    }

    public function active(Payment $payment): Payment
    {
        $payment->is_active = ! $payment->is_active;
        $payment->save();
        $payment->refresh();

        return $payment;
    }

    public function delete(Payment $payment): bool
    {
        return $payment->delete();
    }

    public function deleteAll(array $payments = []): bool
    {
        return Payment::when($payments, fn ($q) => $q->whereIn('id', $payments))->delete();
    }

    public function restore(Payment $payment): bool
    {
        return $payment->restore();
    }

    public function restoreAll(array $payments = []): bool
    {
        return Payment::when($payments, fn ($q) => $q->whereIn('id', $payments))->onlyTrashed()->restore();
    }

    public function deletePermanent(Payment $payment): bool
    {
        $payment->deleteImage();

        return $payment->forceDelete();
    }

    public function deletePermanentAll(array $payments = []): bool
    {
        $payments = Payment::when($payments, fn ($q) => $q->whereIn('id', $payments))->onlyTrashed()->get();

        foreach ($payments as $payment) {
            $payment->deleteImage();
            $payment->forceDelete();
        }

        return true;
    }
}
