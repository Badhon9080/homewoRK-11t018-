@extends("layouts.BacKendLay")
@section("category")
<section>
       <div class="container">
             <div class="row">
                      <div class="d-flex flex-nowrap">
                                 <div class="col-lg-8">
                                    {{-- add category --}}
                                    @if (Route::is("category"))
                                    <div class="card">
                                        <div class="card-heading " style="background-color:purple;">
                                                <h4 style="padding: 12px; color:#fff;">add category</h4>
                                        </div>
                                        <div class="card-body">
                                              <form action="{{ route("store") }}"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                  <input style="padding: 12px;" type="text" name="category" placeholder="category" class="form-control col-lg-12">
                                                  <select name="category_id" id="categoryId" class="form-control col-lg-12 mt-3">
                                                    <option disabled selected>Select and parent the categories</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                    @endforeach
                                              </select>
                                              <label>icon</label>
                                              <input type="file" name="icon" placeholder="Select any image of category" class="form-control col-lg-12 mt-3">
                                              @error("icon")
                                                    <span class="text-danger">{{ $message }}</span>
                                              @enderror
                                                  <button style="padding: 12px;" type="submit" class="btn btn-sm btn-primary btn-hover mt-3">submit</button>
                                              </form>
                                        </div>
                                </div>
                                 {{-- edit category --}}
                                        @else
                                        <div class="card">
                                            <div class="card-heading " style="background-color:purple;">
                                                    <h4 style="padding: 12px; color:yellow">edit category</h4>
                                            </div>
                                            <div class="card-body">
                                                  <form action="{{ route("update",$findCategory->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method("PUT")
                                                    <label for="category">category</label>
                                                      <input style="padding: 12px;" value="{{ $findCategory->category }}" type="text" name="category" placeholder="category" class="form-control col-lg-12">
                                                      <select name="category_id" id="categoryId" class="form-control col-lg-12 mt-3">
                                                        <option disabled selected>Select and parent the categories</option>
                                                      @foreach ($categories as $category)
                                                          @if($findCategory->id!=$category->id)
                                                            <option {{ $findCategory->category_id==$category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->category }}</option>
                                                        @endif
                                                        @endforeach
                                                  </select>
                                                  <label>icon</label>
                                                  <input type="file" name="icon" placeholder="Select any image of category" class="form-control col-lg-12 mt-3">
                                                  <input type="hidden" name="old" value="{{ $findCategory->icon }}">
                                                      <button style="padding: 12px;" type="submit" class="btn btn-sm btn-primary btn-hover mt-3">submit</button>
                                                  </form>
                                            </div>
                                    </div>
                                    @endif
                                 </div>

                                 <div class="col-lg-12">
                                          <table class="table table-stripped" style="border:3px solid #eee; margin-left:12px;">
                                                   <tr>
                                                    <td class="text-center">Sn</td>
                                                    <td class="text-center">icon</td>
                                                    <td class="text-center">category</td>
                                                    <td class="text-center">category_slug</td>
                                                    <td class="text-center"></td>
                                                   </tr>
                                                      @forelse ($parentCategories as $key=>$category)


                                                   <tr>

                                                    <td class="text-center">{{ ++$key }}</td>
                                                    <td class="text-center"><img width="43px" src="{{ asset("storage/".$category->icon) }}" alt="{{ $category->category }}"></td>
                                                    <td class="text-center">{{ $category->category }}</td>
                                                    <td class="text-center">{{ $category->slug }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route("edit",$category->id) }}" class="btn btn-primary btn-sm">edit</a>
                                                       <a href="{{ route("delete",$category->id) }}" class="btn btn-danger btn-sm m-3">delete</a>
                                                </td>
                                                   </tr>
                                                   @if($category->subcategories)
                                                     @foreach ($category->subcategories as $subcategory)
                                                         <tr>
                                                            <td class="text-center">{{ Str("-")->repeat($loop->depth) }}</td>
                                                    <td class="text-center"><img width="43px" src="{{ asset("storage/".$subcategory->icon) }}" alt="{{ $subcategory->category }}"></td>
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

                                                   @empty
                                                        <tr>
                                                        <td>no data found</td>
                                                        </tr>
                                                   @endforelse

                                          </table>
                                 </div>
                      </div>
             </div>
       </div>
</section>
@endsection
