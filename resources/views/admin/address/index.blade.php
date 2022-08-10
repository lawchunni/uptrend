@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto" action="/admin/address" method="get">
                <input autocomplete="off" name="search" type="search" class="form-control rounded" placeholder="Search"
                    style="min-width: 225px" />
                <button class="input-group-text border-0" type="submit">
                    <i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">Province</th>
                <th scope="col">Country</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
                <tr scope="row">
                    <td>{{ $address->id }}</td>
                    <td>{{ $address->user_id }}</td>
                    <td>{{ $address->street }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->province }}</td>
                    <td>{{ $address->country }}</td>
                    <td class="fw-bold">{{ $address->postal_code }}</td>
                    <td>
                        <div class="row mx-0" style="width: fit-content">
                            <div class="col-auto ps-0 ms-0">
                                <a class="btn btn-info"
                                    href="{{ route('admin_address_edit', ['address' => $address->id]) }}"
                                    role="button">Edit</a>
                            </div>
                            @if ($address->is_default_address())
                                <div class="col-auto ps-0 ms-0" tabindex="0" data-bs-toggle="tooltip"
                                    title="Cannot Delete Default Address">
                                    <a href="" class="btn btn-outline-danger disabled" role="button"
                                        onclick="event.preventDefault();">Delete</a>
                                </div>
                            @else
                                <div class="col-auto ps-0 ms-0">
                                    <form method="post" action="/admin/address/{{ $address->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $address->id }}" />
                                        <button onclick="return confirm('Confirm delete this?')"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                <div class="col-auto ps-0 ms-0">
                                    <a href="" class="btn btn-success"
                                        onclick="event.preventDefault();
                                        document.getElementById('set_default_address_{{ $address->id }}').submit();">Set
                                        as Default</a>
                                </div>
                                <form action="/admin/default-address/{{ $address->id }}" method="post" class="d-none"
                                    id="set_default_address_{{ $address->id }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $address->id }}">
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-3">
        {!! $addresses->links('pagination::bootstrap-5') !!}
    </div>
@endsection
