<table>
    <tr><th align="center" colspan="12"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="12"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="12">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.portfolio") }}</b></th>
        <th align="center"><b>{{ trans("index.user") }}</b></th>
        <th align="center"><b>{{ trans("index.payment") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($charges as $charge)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $charge->id }}</td>
            <td align="center">{{ $charge->code }}</td>
            <td>{{ $charge->portfolio?->name }}</td>
            <td>{{ $charge->user?->name }}</td>
            <td>{{ $charge->payment?->code }}</td>
            <td>{{ Str::rupiah($charge->amount) }}</td>
            <td>{{ $charge->image_url }}</td>
            <td>
                @if ($charge->datetime)
                    {{ $charge->datetime->format("l, H:i:s") }}<br>
                    {{ $charge->datetime->isoFormat("LL") }}<br>
                    ({{ $charge->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $charge->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($charge->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
