<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.portfolio") }}</b></th>
        <th align="center"><b>{{ trans("index.domain_hosting_provider") }}</b></th>
        <th align="center"><b>{{ trans("index.payment") }}</b></th>
        <th align="center"><b>{{ trans("index.bank") }}</b></th>
        <th align="center"><b>{{ trans("index.amount") }}</b></th>
        <th align="center"><b>{{ trans("index.datetime") }}</b></th>
        <th align="center"><b>{{ trans("index.notes") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($buyDomainHostings as $buyDomainHosting)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $buyDomainHosting->id }}</td>
            <td align="center">{{ $buyDomainHosting->code }}</td>
            <td>{{ $buyDomainHosting->portfolio?->name }}</td>
            <td>{{ $buyDomainHosting->advertisementProvider?->name }}</td>
            <td>{{ $buyDomainHosting->payment?->code }}</td>
            <td>{{ $buyDomainHosting->bank?->name }}</td>
            <td>{{ $buyDomainHosting->account_number }}</td>
            <td>{{ $buyDomainHosting->account_name }}</td>
            <td>{{ Str::rupiah($buyDomainHosting->amount) }}</td>
            <td>{{ $buyDomainHosting->image_url }}</td>
            <td>
                @if ($buyDomainHosting->datetime)
                    {{ $buyDomainHosting->datetime->format("l, H:i:s") }}<br>
                    {{ $buyDomainHosting->datetime->isoFormat("LL") }}
                @endif
            </td>
            <td>{{ $buyDomainHosting->notes }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($buyDomainHosting->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
