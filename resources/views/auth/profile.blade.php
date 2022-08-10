@extends('layouts.app')

@section('content')
    <main>
        <div class="container profile">
            <div class="wrapper">
                <!-- Sidebar started -->
                <aside>
                    <ul>
                        <li>
                            <a class="active">User Info</a>
                        </li>
                        <li>
                            <a href="{{ route('order-history') }}">Order History</a>
                        </li>
                    </ul>
                </aside><!-- Sidebar end -->

                <!-- Profile started -->
                <div class="content form" id="user_info">

                    <a href="{{ route('profile-edit', ['user' => $user->id]) }}" class="btn edit_btn">Edit</a>

                    <h1>{{ $title }}</h1>

                    <div class="user_info">
                        <div class="row">
                            <span class="title">Name :</span>
                            <span class="value">{{ $user->first_name . ' ' . $user->last_name }}</span>
                        </div>
                        <div class="row">
                            <span class="title">Email :</span>
                            <span class="value">{{ $user->email }}</span>
                        </div>
                        <div class="row">
                            <span class="title">Phone :</span>
                            <span class="value">{{ $user->phone }}</span>
                        </div>
                    </div>

                    <div class="user_address">

                        <h2>User Address</h2>

                        <div class="addr_content">
                            <div class="add_addr">
                                <a href="{{ route('address_add') }} " class="btn btn_white">Add New Address</a>
                            </div>

                            @foreach ($addresses as $key => $address)
                                <div class="row
                                @if ($address->is_default_address()) hightlight @endif"
                                    id="address_{{ $address->id }}">
                                    <div class="num">&#35; {{ $key + 1 }}
                                        @if ($address->is_default_address())
                                            (Default Address)
                                        @endif
                                    </div>

                                    <div class="full_address">
                                        <div>{{ $address->full_address() }}</div>
                                        <div>{{ $address->user_postal_code() }}</div>
                                    </div>

                                    <div class="action">
                                        @if (!$address->is_default_address())
                                        @endif

                                        <div>
                                            <a
                                                href="{{ route('address-edit', ['user_address' => $address->id]) }}">Edit</a>
                                        </div>

                                        @if (!$address->is_default_address())
                                            <div>
                                                <form method="post" action="/address/{{ $address->id }}"
                                                    id="address_delete_{{ $address->id }}" style="width: min-content">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $address->id }}" />
                                                    <button onclick="return confirm('Confirm delete to this address?')"
                                                        class="btn-delete">Delete</button>
                                                </form>
                                            </div>

                                            <div>
                                                <form action="/default-address/{{ $address->id }}" method="post"
                                                    id="set_default_address_{{ $address->id }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                </form>

                                                <a href="javascript:;"
                                                    onclick="event.preventDefault();
                                                document.getElementById('set_default_address_{{ $address->id }}').submit();">Set
                                                    as Default</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div><!-- Profile end -->
            </div>
        </div>
    </main>
@endsection
