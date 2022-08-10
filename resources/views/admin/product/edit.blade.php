@extends('layouts/admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">Edit Product</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin_product_update', ['product' => $product->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter Name" value="{{ old('name', $product->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color"
                                name="color" placeholder="Enter Color" value="{{ old('color', $product->color) }}">
                            @error('color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" placeholder="Enter Price" value="{{ old('price', $product->price) }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                id="quantity" name="quantity" placeholder="Enter Quantity"
                                value="{{ old('quantity', $product->quantity) }}">
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Image</label>
                            @if ($product->product_media && count($product->product_media) > 0)
                                <div>
                                    @foreach ($product->product_media as $item)
                                        <div class="d-inline-block p-2" id="div_{{ $item->id }}">
                                            <img class="img-thumbnail" width="100" height="100"
                                                data-id="{{ $item->id }}" src="/storage/{{ $item->image }}" alt="product image" />
                                            <button type="button" class="d-block m-auto mt-2 btn btn-danger btn-sm"
                                                data-id="{{ $item->id }}"
                                                onclick="if(confirm('Are you sure you want to delete the image?')) onMediaDelete(event,this);">Delete</button>
                                        </div>
                                    @endforeach
                                </div>
                                <br />
                            @endif
                            <input id="images" type="file" name="images[]" multiple
                                class="form-control  @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror"
                                accept="image/*">
                            @error('images')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="ckeditor form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" placeholder="Enter Description">{!! old('description', $product->description) !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select id="category_id" multiple class="form-select @error('category_id') is-invalid @enderror"
                                name="category_id[]">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ collect(old('category_id', $oldCategoryIds))->contains($cat->id) ? 'selected' : '' }}>
                                        {{ $cat->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender_id" class="form-label">Gender</label>
                            <select class="form-select @error('gender_id') is-invalid @enderror" id="gender_id"
                                name="gender_id">
                                {{-- <option value="">Select Gender</option> --}}
                                @foreach ($genders as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('gender_id', $product->gender_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="size_id" class="form-label">Size</label>
                            <select class="form-select @error('size_id') is-invalid @enderror" id="size_id"
                                name="size_id">
                                {{-- <option value="">Select Size</option> --}}
                                @foreach ($sizes as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('size_id', $product->size_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('size_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer-script')
<script>
    function onMediaDelete(e, el) {
        const id = el.dataset.id;
        $(document).ready(function() {
            $.ajax({
                url: "/admin/product/media/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    _token: '{{ csrf_token() }}'
                },
                success: function() {
                    $('div').remove(`#div_${id}`);

                    $(`div[data-id="${id}"]`).hide();
                }
            });

        });
    }
</script>
@endsection