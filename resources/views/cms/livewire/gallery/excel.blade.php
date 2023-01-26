<table>
    <tr><th align="center" colspan="12"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="12"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="12">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.tag") }}</b></th>
        <th align="center"><b>{{ trans("index.tag_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.video") }}</b></th>
        <th align="center"><b>{{ trans("index.youtube") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($galleries as $gallery)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $gallery->id }}</td>
            <td>{{ $gallery->galleryCategory?->name }}</td>
            <td>{{ $gallery->name }}</td>
            <td>{{ $gallery->name_idn }}</td>
            <td>{{ $gallery->description }}</td>
            <td>{{ $gallery->description_idn }}</td>
            <td>{{ $gallery->tag }}</td>
            <td>{{ $gallery->tag_idn }}</td>
            <td>{{ $gallery->image_url }}</td>
            <td>{{ $gallery->video_url }}</td>
            <td>{{ $gallery->youtube }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($gallery->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
