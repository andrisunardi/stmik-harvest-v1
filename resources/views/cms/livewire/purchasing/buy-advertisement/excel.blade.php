<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.advertisement_provider") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($buyAdvertisements as $buyAdvertisement)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $buyAdvertisement->id }}</td>
            <td align="center">{{ $buyAdvertisement->code }}</td>
            <td>{{ $buyAdvertisement->advertisementProvider?->name }}</td>
            <td>{{ $buyAdvertisement->bank?->name }}</td>
            <td>{{ $buyAdvertisement->account_number }}</td>
            <td>{{ $buyAdvertisement->account_name }}</td>
            <td>{{ Str::rupiah($buyAdvertisement->amount) }}</td>
            <td>{{ $buyAdvertisement->image_url }}</td>
            <td>
                @if ($buyAdvertisement->datetime)
                    {{ $buyAdvertisement->datetime->format("l, H:i:s") }}<br>
                    {{ $buyAdvertisement->datetime->isoFormat("LL") }}
                @endif
            </td>
            <td>{{ $buyAdvertisement->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($buyAdvertisement->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
