<table>
    <tr><th align="center" colspan="13"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="13"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="13">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($googleAdsenses as $googleAdsense)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $googleAdsense->id }}</td>
            <td align="center">{{ $googleAdsense->code }}</td>
            <td>{{ $googleAdsense->bank?->name }}</td>
            <td>{{ $googleAdsense->account_number }}</td>
            <td>{{ $googleAdsense->account_name }}</td>
            <td>{{ Str::rupiah($googleAdsense->amount) }}</td>
            <td>{{ $googleAdsense->image_url }}</td>
            <td>
                @if ($googleAdsense->datetime)
                    {{ $googleAdsense->datetime->format("l, H:i:s") }}<br>
                    {{ $googleAdsense->datetime->isoFormat("LL") }}<br>
                    ({{ $googleAdsense->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $googleAdsense->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($googleAdsense->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
