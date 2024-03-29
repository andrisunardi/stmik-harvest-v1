<table>
    <tr><th align="center" colspan="8"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="8"><b>{{ Str::upper(Str::translate($title)) }}</b></th></tr>
    <tr><th align="center" colspan="8">{{ trans("index.printed_date") }} : {{ now()->isoFormat("LLLL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($banners as $banner)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $banner->id }}</td>
            <td>{{ $banner->bannerCategory?->name }}</td>
            <td>{{ $banner->name }}</td>
            <td>{{ $banner->name_idn }}</td>
            <td>{{ $banner->description }}</td>
            <td>{{ $banner->description_idn }}</td>
            <td>{{ $banner->image_url }}</td>
            <td align="center">{{ Str::translate(Str::active($banner->is_active)) }}</td>
        </tr>
    @endforeach
</table>
