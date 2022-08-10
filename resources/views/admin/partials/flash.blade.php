@if (session()->has('success'))
    <div class="alert alert-success text-center alert-dismissible fade show">
        <div class="fw-bold">{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger text-center alert-dismissible fade show">
        <div class="fw-bold">{{ session('error') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
