@forelse ($categories as $row)
<option value="{{$row->id}}"
    {{ isset($category)&&$category->parent_id==$row->id ? 'selected' : ''}}>
    @for ($i = 0; $i < $level; $i++)
    --|
    @endfor
    {{$row->name}}
</option>
@includeWhen($row->sub->count(),'admin.categories.option',['level' => $level + 1, 'categories' => $row->sub])

@empty

@endforelse
