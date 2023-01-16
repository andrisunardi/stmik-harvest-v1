<div
    {{-- wire:poll.1000ms --}}
    >
    {{ trans("index.server_time") }} :
    {{ now()->format("l - H:i:s") }} {{ now()->isoFormat("LL") }}
</div>
