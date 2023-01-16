<table>
    <tr><th align="center" colspan="12"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="12"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="12">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.deposit_category") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($deposits as $deposit)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $deposit->id }}</td>
            <td align="center">{{ $deposit->code }}</td>
            <td>{{ $deposit->depositCategory?->name }}</td>
            <td>{{ $deposit->bank?->name }}</td>
            <td>{{ $deposit->account_number }}</td>
            <td>{{ $deposit->account_name }}</td>
            <td>{{ Str::rupiah($deposit->amount) }}</td>
            <td>{{ $deposit->image_url }}</td>
            <td>
                @if ($deposit->datetime)
                    {{ $deposit->datetime->format("l, H:i:s") }}<br>
                    {{ $deposit->datetime->isoFormat("LL") }}<br>
                    ({{ $deposit->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $deposit->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($deposit->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
