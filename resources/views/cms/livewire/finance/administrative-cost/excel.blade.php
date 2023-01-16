<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.date") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($administrativeCosts as $administrativeCost)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $administrativeCost->id }}</td>
            <td align="center">{{ $administrativeCost->code }}</td>
            <td>{{ $administrativeCost->bank?->name }}</td>
            <td>{{ Str::rupiah($administrativeCost->amount) }}</td>
            <td>
                @if ($administrativeCost->date)
                    {{ $administrativeCost->date->format("l,") }}
                    {{ $administrativeCost->date->isoFormat("LL") }}
                @endif
            </td>
            <td>{{ $administrativeCost->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($administrativeCost->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
