<div
    {{-- wire:poll.1000ms --}}
    >
    {{ trans("index.server_time") }} :
    {{ now()->isoFormat("LLLL") }}
</div>
