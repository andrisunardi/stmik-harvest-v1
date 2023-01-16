<table>
    <tr><th align="center" colspan="13"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="13"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="13">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
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
    @foreach ($salaries as $salary)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $salary->id }}</td>
            <td align="center">{{ $salary->code }}</td>
            <td>{{ $salary->user?->name }}</td>
            <td>{{ $salary->bank?->name }}</td>
            <td>{{ $salary->account_number }}</td>
            <td>{{ $salary->account_name }}</td>
            <td>{{ Str::rupiah($salary->amount) }}</td>
            <td>{{ $salary->image_url }}</td>
            <td>
                @if ($salary->datetime)
                    {{ $salary->datetime->format("l, H:i:s") }}<br>
                    {{ $salary->datetime->isoFormat("LL") }}<br>
                    ({{ $salary->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $salary->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($salary->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
