<table>
    <tr><th align="center" colspan="18"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="18"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="18">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.administrative_cost") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.bank_interest") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.buy_advertisement") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.buy_domain_hosting") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.buy_endorse") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.buy_internet") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.buy_item") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.buy_phone_credit") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.google_adsense") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.loyalty") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.payment") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.salary") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.user") }}</b></th>
    </tr>
    @foreach ($banks as $bank)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $bank->id }}</td>
            <td align="center">{{ $bank->code }}</td>
            <td>{{ $bank->name }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($bank->is_active), "_")) }}</td>
            <td align="center">{{ $bank->administrativeCosts->count() }}</td>
            <td align="center">{{ $bank->bankInterests->count() }}</td>
            <td align="center">{{ $bank->buyAdvertisements->count() }}</td>
            <td align="center">{{ $bank->buyDomainHostings->count() }}</td>
            <td align="center">{{ $bank->buyEndorses->count() }}</td>
            <td align="center">{{ $bank->buyInternets->count() }}</td>
            <td align="center">{{ $bank->buyItems->count() }}</td>
            <td align="center">{{ $bank->buyPhoneCredits->count() }}</td>
            <td align="center">{{ $bank->googleAdsenses->count() }}</td>
            <td align="center">{{ $bank->loyalties->count() }}</td>
            <td align="center">{{ $bank->payments->count() }}</td>
            <td align="center">{{ $bank->salaries->count() }}</td>
            <td align="center">{{ $bank->users->count() }}</td>
        </tr>
    @endforeach
</table>
