@extends('layouts/admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">Add Product</h2>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin_product_save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color"
                                name="color" placeholder="Enter Color" value="{{ old('color') }}">
                            @error('color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" placeholder="Enter Price" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                id="quantity" name="quantity" placeholder="Enter Quantity" value="{{ old('quantity') }}">
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">Image</label>
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
                            <textarea id="description" class="ckeditor form-control @error('description') is-invalid @enderror" name="description"
                                rows="3" placeholder="Enter Description">{!! old('description') !!}</textarea>
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
                                        {{ collect(old('category_id'))->contains($cat->id) ? 'selected' : '' }}>
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
                                        {{ old('gender_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                        {{ old('size_id') == $item->id ? 'selected' : '' }}>
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
