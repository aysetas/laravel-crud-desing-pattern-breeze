@props(['category']);
<div>
    {{$category->name}}
    @foreach($category->children as $child)
        <div>
            < x-category-item :category="$child"/>
        </div>
    @endforeach
</div>
