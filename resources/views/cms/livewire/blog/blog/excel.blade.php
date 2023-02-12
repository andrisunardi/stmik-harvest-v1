<table>
    <tr><th align="center" colspan="15"><b>{{ env("APP_NAME") }}</b></th></tr>
    <tr><th align="center" colspan="15"><b>{{ Str::upper(trans("index." . Str::slug($title, '_'))) }}</b></th></tr>
    <tr><th align="center" colspan="15">{{ trans("index.printed_date") }} : {{ now()->format("l, H:i:s") }} {{ now()->isoFormat("LL") }}</th></tr>
    <tr></tr>
    <tr>
        <th align="center"><b>{{ trans("index.#") }}</b></th>
        <th align="center"><b>{{ trans("index.id") }}</b></th>
        <th align="center"><b>{{ trans("index.blog_category") }}</b></th>
        <th align="center"><b>{{ trans("index.title") }}</b></th>
        <th align="center"><b>{{ trans("index.title_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.short_body") }}</b></th>
        <th align="center"><b>{{ trans("index.short_body_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.body") }}</b></th>
        <th align="center"><b>{{ trans("index.body_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.date") }}</b></th>
        <th align="center"><b>{{ trans("index.tag") }}</b></th>
        <th align="center"><b>{{ trans("index.tag_idn") }}</b></th>
        <th align="center"><b>{{ trans("index.image") }}</b></th>
        <th align="center"><b>{{ trans("index.slug") }}</b></th>
        <th align="center"><b>{{ trans("index.active") }}</b></th>
    </tr>
    @foreach ($blogs as $blog)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td align="center">{{ $blog->id }}</td>
            <td>{{ $blog->blogCategory?->name }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->title_idn }}</td>
            <td>{{ $blog->short_body }}</td>
            <td>{{ $blog->short_body_idn }}</td>
            <td>{{ $blog->body }}</td>
            <td>{{ $blog->body_idn }}</td>
            <td>
                @if ($blog->date)
                    {{ $blog->date->format("l,") }}
                    {{ $blog->date->isoFormat("LL") }}
                    <br>
                    ({{ $blog->date->diffForHumans() }})
                @endif
            </td>
            <td>{{ $blog->tag }}</td>
            <td>{{ $blog->tag_idn }}</td>
            <td>{{ $blog->image_url }}</td>
            <td>{{ $blog->slug }}</td>
            <td align="center">{{ Str::translate(Str::active($blog->is_active)) }}</td>
        </tr>
    @endforeach
</table>
