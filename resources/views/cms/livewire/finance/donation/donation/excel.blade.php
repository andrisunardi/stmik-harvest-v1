<table>
    <tr><th align="center" colspan="12"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="12"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="12">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.donation_category") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.account_number") }}</b></th>
        <th align="center"><b>{{ trans("index.account_name") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($donations as $donation)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $donation->id }}</td>
            <td align="center">{{ $donation->code }}</td>
            <td>{{ $donation->donationCategory?->name }}</td>
            <td>{{ $donation->bank?->name }}</td>
            <td>{{ $donation->account_number }}</td>
            <td>{{ $donation->account_name }}</td>
            <td>{{ Str::rupiah($donation->amount) }}</td>
            <td>{{ $donation->image_url }}</td>
            <td>
                @if ($donation->datetime)
                    {{ $donation->datetime->format("l, H:i:s") }}<br>
                    {{ $donation->datetime->isoFormat("LL") }}<br>
                    ({{ $donation->datetime->diffForHumans() }})
                @endif
            </td>
            <td>{{ $donation->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($donation->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
