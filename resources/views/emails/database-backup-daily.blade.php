<x-mail::message>
    {{ trans("index.database_backup_daily") }}

    {{ trans("index.date") }} : {{ now()->isoFormat("dddd, DD MMMM YYYY") }}

    {{ trans("index.created_at") }} : {{ now() }}
</x-mail::message>
