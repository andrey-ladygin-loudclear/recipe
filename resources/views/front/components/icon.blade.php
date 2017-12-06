<a href="/ingredients/{{ $item->id }}" class="icon">
    <img src="{{ \App\Helpers\IconHelper::asset($item->icon) }}" alt="{{ $item->name }}" title="{{ $item->name }}">
    <span class="hover"></span>
</a>