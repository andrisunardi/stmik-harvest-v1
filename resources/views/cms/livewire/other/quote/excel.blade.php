<table>
    <tr><th align="center" colspan="6"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="6"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="6">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.owner") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($quotes as $quote)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $quote->id }}</td>
            <td align="center">{{ $quote->code }}</td>
            <td>{{ $quote->name }}</td>
            <td>{{ $quote->owner }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($quote->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
