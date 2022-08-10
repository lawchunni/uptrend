@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header">
            <h2 class="mb-0">Edit Shipping Charge</h2>
        </div>
        <div class="card-body">
            {{-- {{ $errors }} --}}
          <form  enctype="multipart/form-data" id="edit" action="/admin/shipping-charge/{{ $shippingcharge->id }}" method="post">
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{ $shippingcharge->id }}" />
              <div class="mb-3">
                <label for="continent" class="form-label">Continent</label>
                <input type="text" name="continent" class="form-control @error('continent') is-invalid @enderror" id="continent" value="{{ old('continent', $shippingcharge->continent) }}" />
                @error('continent')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="country" class="form-label">Continent</label>
                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="country" value="{{ old('country', $shippingcharge->country) }}" />
                @error('country')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="charge" class="form-label">Continent</label>
                <input type="text" name="charge" class="form-control @error('charge') is-invalid @enderror" id="charge" value="{{ old('charge', $shippingcharge->charge) }}" />
                @error('charge')
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