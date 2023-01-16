<table>
    <tr><th align="center" colspan="14"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="14"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="14">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.portfolio") }}</b></th>
        <th align="center"><b>{{ trans("index.user") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($loyalties as $loyalty)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $loyalty->id }}</td>
            <td align="center">{{ $loyalty->code }}</td>
            <td>{{ $loyalty->portfolio?->name }}</td>
            <td>{{ $loyalty->user?->name }}</td>
            <td>{{ $loyalty->bank?->name }}</td>
            <td>{{ $loyalty->account_number }}</td>
            <td>{{ $loyalty->account_name }}</td>
            <td>{{ Str::rupiah($loyalty->amount) }}</td>
            <td>{{ $loyalty->image_url }}</td>
            <td>
                @if ($loyalty->datetime)
                    {{ $loyalty->datetime->format("l, H:i:s") }}<br>
                    {{ $loyalty->datetime->isoFormat("LL") }}<br>
                    ({{ $loyalty->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $loyalty->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($loyalty->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
