<?php

namespace App\Services;

use App\Models\Network;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NetworkService
{
    public $table = 'networks';

    public $slug = 'network';

    public function add(array $data = []): Network
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Network::create($data);
    }

    public function clone(array $data, Network $network): Network
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($network->checkImage()) {
                $data['image'] = "{$imageName}.".explode('.', $network->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$network->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Network::create($data);
    }

    public function edit(Network $network, $data): Network
    {
        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $network->deleteImage();

            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $network->update($data);
        $network->refresh();

        return $network;
    }

    public function active(Network $network): Network
    {
        $network->is_active = ! $network->is_active;
        $network->save();
        $network->refresh();

        return $network;
    }

    public function deleteImage(Network $network)
    {
        $network->deleteImage();

        $network->image = null;
        $network->save();
        $network->refresh();

        return $network;
    }

    public function delete(Network $network): bool
    {
        return $network->delete();
    }

    public function deleteAll(array $networks = []): bool
    {
        return Network::when($networks, fn ($q) => $q->whereIn('id', $networks))->delete();
    }

    public function restore(Network $network): bool
    {
        return $network->restore();
    }

    public function restoreAll(array $networks = []): bool
    {
        return Network::when($networks, fn ($q) => $q->whereIn('id', $networks))->onlyTrashed()->restore();
    }

    public function deletePermanent(Network $network): bool
    {
        $network->deleteImage();

        return $network->forceDelete();
    }

    public function deletePermanentAll(array $networks = []): bool
    {
        $networks = Network::when($networks, fn ($q) => $q->whereIn('id', $networks))->onlyTrashed()->get();

        foreach ($networks as $network) {
            $network->deleteImage();
            $network->forceDelete();
        }

        return true;
    }
}
