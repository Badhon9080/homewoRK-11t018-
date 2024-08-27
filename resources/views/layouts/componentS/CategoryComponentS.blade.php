@if($subcategory->subcategories)
@foreach ($subcategory->subcategories as $subcategory)
    <tr>
       <td class="text-center">{{ Str("-")->repeat($loop->depth) }}</td>
<td class="text-center"><img width="43px" src="{{ $subcategory->icon ? asset("storage/".$subcategory->icon) : "" }}" alt="{{ $subcategory->category }}"></td>
<td class="text-center">{{ $subcategory->category }}</td>
<td class="text-center">{{ $subcategory->slug }}</td>
<td class="text-center">
    <a href="{{ route("edit",$subcategory->id) }}" class="btn btn-primary btn-sm">edit</a>
   <a href="{{ route("delete",$subcategory->id) }}" class="btn btn-danger btn-sm m-3">delete</a>
</td>

    </tr>
    @include("layouts.componentS.CategoryComponentS")
@endforeach
@endif
