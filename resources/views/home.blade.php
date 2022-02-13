@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-5">
            @if($users->count() > 0)
                <h3>You logged in as {{Auth::user()->name}}</h3>
                <ul id="users">
                    @foreach($users as $user)
                        <li style="margin: 5px">
                            {{-- <span class="label label-info">{{ $user->name }}</span>  --}}
                            {{-- <a href="javascript:void(0);" class="chat-toggle" data-id="{{ $user->id }}" 
                                data-user="{{ $user->name }}">Open chat</a> --}}
                                <button id="{{ $user->id }}" type="button" class="btn btn-info btn-sm chat_btn" data-toggle="modal" 
                                    data-target="#myModal">Message with {{ $user->name }}</button>
                            </li>
                    @endforeach
                </ul>
            @else
                <p>No users found! try to add a new user using another browser by going to <a href="{{ url('register') }}">Register page</a></p>
            @endif
        </div>
    </div>
<a href="{{url('/sendMessage')}}" >sendMessa</a>
    @include('chat-box')

    @endsection

