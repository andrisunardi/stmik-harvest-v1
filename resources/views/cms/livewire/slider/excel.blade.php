<table>
    <tr><th align="center" colspan="11"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="11"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="11">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.button_name") }}</b></th>
        <th align="center"><b>{{ trans("index.button_name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.button_link") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($sliders as $slider)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $slider->id }}</td>
            <td>{{ $slider->name }}</td>
            <td>{{ $slider->name_idn }}</td>
            <td>{{ $slider->description }}</td>
            <td>{{ $slider->description_idn }}</td>
            <td>{{ $slider->button_name }}</td>
            <td>{{ $slider->button_name_idn }}</td>
            <td>{{ $slider->button_link }}</td>
            <td>{{ $slider->image_url }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($slider->is_active), "_")) }}</td>
        </tr>
    @endforeach
</table>
