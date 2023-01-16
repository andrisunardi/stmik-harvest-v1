<table>
    <tr><th align="center" colspan="12"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="12"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="12">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.withdraw_category") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($withdraws as $withdraw)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $withdraw->id }}</td>
            <td align="center">{{ $withdraw->code }}</td>
            <td>{{ $withdraw->withdrawCategory?->name }}</td>
            <td>{{ $withdraw->bank?->name }}</td>
            <td>{{ $withdraw->account_number }}</td>
            <td>{{ $withdraw->account_name }}</td>
            <td>{{ Str::rupiah($withdraw->amount) }}</td>
            <td>{{ $withdraw->image_url }}</td>
            <td>
                @if ($withdraw->datetime)
                    {{ $withdraw->datetime->format("l, H:i:s") }}<br>
                    {{ $withdraw->datetime->isoFormat("LL") }}<br>
                    ({{ $withdraw->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $withdraw->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($withdraw->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
