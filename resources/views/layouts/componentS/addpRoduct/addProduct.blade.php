@extends("layouts.BacKendLay")
@section("category")
<section>
      <div class="container-fluid"
      </div>
      <div class="container">
        <form action="{{ route("product.admin.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="row">
            <div class="col-12 text-end mt-3" style="margin-left: 630px;">
            <li>
                <button type="submit"  class="main-btn primary-btn square-btn hover-btn">Store</button>
            </li>
        </div>
              <div class="d-flex flex-nowrap">
                    <div class="col-lg-12">
                        <div class="card-style">
                            <div class="input-style-1">
                                <label>Title</label>
                                <input type="text" class="form control" placeholder="product title" name="title">
                                @error("title")
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-style-1">
                                        <label>Price</label>
                                        <input type="text" class="form control" placeholder="product price" name="price">
                                        @error("price")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-style-1">
                                        <label>Selling price</label>
                                        <input type="text" class="form control" placeholder="discount price" name="selling_price">
                                        @error("selling_price")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-style-1">
                                        <label>SKU</label>
                                        <input type="text" class="form control" placeholder="SKU" name="sku">
                                        @error("sku")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-style-1">
                                        <div class="select-style-1">
                                        <label>STOCK</label>

                                              <div class="select-position">
                                                <select name="stock">
                                                      <option selected value="{{ true }}">in STOCK</option>
                                                      <option value="{{ false }}">out of STOCK</option>
                                                </select>
                                                @error("selling_price")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                            </div>
                                          </div>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-style-1">
                                        <label>BRand</label>
                                        <input type="text" class="form control" placeholder="BRand" name="brand">
                                        @error("brand")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                             <div class="input-style-1 col-lg-12">
                                <textarea type="text" name="short_detail" placeholder="Short details" class="control-form mt-3"></textarea>
                             </div>
                             <div class="input-style-1 col-lg-12">
                                <textarea type="text" name="long_detail" id="longdeTail" placeholder="long details" class="control-form mt-3"></textarea>
                             </div>

                           <div class="d-lg-flex">
                                <div class="col-lg-6">
                                    <div class="form-check form-switch toggle-switch mb-30">
                                        <input class="form-check-input" type="checkbox" name="status" value="{{ 1 }}" id="status" checked>
                                        <label class="form-check-label" for="status">Status</label>
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-switch toggle-switch mb-30">
                                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="{{ 1 }}" >
                                        <label class="form-check-label" for="featured">Featured</label>
                                      </div>
                                </div>
                           </div>

                        </div>
                    </div>

                    <div class="col-lg-8" style="margin-left:12px;">
                          <div class="card-style">
                                 <div class="input-style-1">
                                       <label>featured image</label>
                                       <input type="file" name="featured_img" placeholder="Select any image">
                                       @error("featured_img")
                                       <span class="text-danger">{{ $message }}</span>

                                       @enderror
                                 </div>
                                 <div class="input-style-1"><label>galleries images</label>
                                    <input type="file" multiple name="galleries[]" placeholder="Select galleries images">
                                    @error("galleries.*")
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                 </div>
                                 <div class="input-style-1 col-lg-12">
                                       <label>categories</label>
                                       <select style="width:100%;"  multiple name="categories[]" class="categoryItems">
                                        @foreach ($categories as $category)
                                             <option value="{{ $category->id }}">{{ Str($category->category)->headline() }}</option>
                                        @endforeach
                                       </select>
                                 </div>
                          </div>
                    </div>
              </div>
           </div>
        </form>
      </div>
</section>
@push("customCSS")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2 span{
        display:block !important;
    }
</style>
@endpush
@push("customJS")
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector("#longdeTail"))
    .catch(error=>
    {console.error(error);
    });
</script>
<script>
$(document).ready(function() {
    $('.categoryItems').select2();
});
</script>
@endpush
@endsection
