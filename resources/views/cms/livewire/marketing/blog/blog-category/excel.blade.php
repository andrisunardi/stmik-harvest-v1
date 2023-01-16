<table>
    <tr><th align="center" colspan="10"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="10"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="10">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.code") }}</b></th>
        <th align="center"><b>{{ trans("index.name") }}</b></th>
        <th align="center"><b>{{ trans("index.name_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.description") }}</b></th>
        <th align="center"><b>{{ trans("index.description_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.slug") }}</b></th>
        <th align="center"><b>{{ trans("index.is_active") }}</b></th>
        <th align="center"><b>{{ trans("index.total") }} {{ trans("index.blog") }}</b></th>
    </tr>
    @foreach ($blogCategories as $blogCategory)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $blogCategory->id }}</td>
            <td align="center">{{ $blogCategory->code }}</td>
            <td>{{ $blogCategory->name }}</td>
            <td>{{ $blogCategory->name_idn }}</td>
            <td>{{ $blogCategory->description }}</td>
            <td>{{ $blogCategory->description_idn }}</td>
            <td>{{ $blogCategory->slug }}</td>
            <td align="center">{{ trans("index." . Str::slug(Str::active($blogCategory->is_active), "_")) }}</td>
            <td align="center">{{ $blogCategory->blogs->count() }}</td>
        </tr>
    @endforeach
</table>
