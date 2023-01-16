<table>
    <tr><th align="center" colspan="9"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="9"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="9">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.price") }}</b></th>
        <th align="center"><b>{{ trans("index.price_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
    </tr>
    @foreach ($priceLists as $priceList)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $priceList->id }}</td>
            <td>{{ $priceList->name }}</td>
            <td>{{ $priceList->name_idn }}</td>
            <td>{{ $priceList->description }}</td>
            <td>{{ $priceList->description_idn }}</td>
            <td>{{ $priceList->price }}</td>
            <td>{{ $priceList->price_idn }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($priceList->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
