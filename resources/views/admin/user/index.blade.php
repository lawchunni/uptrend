@extends('layouts.admin')

@section('content')
    <div class="header_bar">
        <h1>{{ $title }}</h1>

        <!-- Search form -->
        <div class="search_form">
            <form class="d-md-flex input-group w-auto my-auto" action="/admin/user" method="get">
                <input autocomplete="off" name="search" type="search" class="form-control rounded" placeholder="Search"
                    style="min-width: 225px" />
                <button class="input-group-text border-0" type="submit">
                    <i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    @if (isset($users) && !count($users))
        @if (isset($search) && $search)
            <h3 class="py-5 text-center"> Sorry, we could not find any users matching "{{ $search }}"!</h3>
        @else
            <h3 class="py-5 text-center"> There no data available! </h3>
        @endif
    @else
        @if (isset($search) && $search)
            <h4 class="text-muted"> You searched for: {{ $search }}</h4>
        @endif
        @foreach ($users as $user)
            <div class="row shadow-lg my-2 p-2 rounded bg-light align-content-center">
                <div class="col-md-1">
                    <p class="small mb-1">#{{ $user->id }}</p>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="{{ route('admin_user_edit', ['user' => $user->id]) }}"
                        class="text-decoration-none">{{ $user->first_name . ' ' . $user->last_name }}</a>

                </div>
                <div class="col-md-2">
                    <p> <i class="fa fa-phone" aria-hidden="true"></i> {{ $user->phone }}
                    </p>
                </div>
                <div class="col-md-3">
                    <p> <i class="fa fa-envelope" aria-hidden="true"></i> {{ $user->email }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="row mx-0 justify-content-end">
                        <div class="col-auto ps-0 ms-0">
                            <button class="btn btn-sm btn-secondary m-1" type="button" data-bs-toggle="collapse"
                                data-bs-target="#address_{{ $user->id }}" aria-expanded="false"
                                aria-controls="address_{{ $user->id }}">
                                View Address
                            </button>
                        </div>
                        <div class="col-auto ps-0 ms-0">
                            <a class="btn btn-sm btn-outline-primary  m-1"
                                href="{{ route('admin_user_edit', ['user' => $user->id]) }}" role="button">
                                <i class="fas fa-pencil"></i>
                            </a>
                        </div>
                        @if ($user->admin == true)
                            <div class="col-auto ps-0 ms-0  m-1" tabindex="0" data-bs-toggle="tooltip"
                                title="Cannot Delete Admin User">
                                <a href="" class="btn btn-sm btn-outline-danger disabled" role="button"
                                    onclick="event.preventDefault();">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        @else
                            <div class="col-auto ps-0 ms-0  m-1">
                                <form method="post" action="/admin/user/{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                    <button onclick="return confirm('Confirm delete this?')"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 shadow collapse" id="address_{{ $user->id }}">
                    <table class="table table-striped small">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->user_addresses as $address)
                                <tr>
                                    <td>{{ $address->id }}</td>
                                    <td>{{ $address->full_address() }} {{ $address->postal_code }}</td>
                                    <td>
                                        <div class="row mx-0 justify-content-end" style="width: fit-content">
                                            <div class="col-auto ps-0 ms-0">
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ route('admin_address_edit', ['address' => $address->id]) }}"
                                                    role="button">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                            </div>
                                            @if ($address->is_default_address())
                                                <div class="col-auto ps-0 ms-0" tabindex="0" data-bs-toggle="tooltip"
                                                    title="Cannot Delete Default Address">
                                                    <a href="" class="btn btn-sm btn-outline-danger disabled"
                                                        role="button" onclick="event.preventDefault();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="col-auto ps-0 ms-0">
                                                    <form method="post" action="/admin/address/{{ $address->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $address->id }}" />
                                                        <button onclick="return confirm('Confirm delete this?')"
                                                            class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-auto ps-0 ms-0">
                                                    <a href="" class="btn btn-sm btn-success"
                                                        onclick="event.preventDefault();
                                        document.getElementById('set_default_address_{{ $address->id }}').submit();">
                                                        Set as Default
                                                    </a>
                                                </div>
                                                <form action="/admin/default-address/{{ $address->id }}" method="post"
                                                    class="d-none" id="set_default_address_{{ $address->id }}">
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
                </div>
            </div>
        @endforeach
    @endif
    <div class="px-3">
        {!! $users->links('pagination::bootstrap-5') !!}
    </div>
@endsection
