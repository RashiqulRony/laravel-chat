@extends('layouts.app')

@section('content')
    <video-chat
        :allusers="{{ $users }}"
        :authUserId="{{ auth()->id() }}"
        pusher-key="{{ config('broadcasting.connections.pusher.key') }}"
        pusher-cluster="{{ config('broadcasting.connections.pusher.options.cluster') }}"
        turn_url="{{ env('TURN_SERVER_URL') }}"
        turn_username="{{ env('TURN_SERVER_USERNAME') }}"
        turn_credential="{{ env('TURN_SERVER_CREDENTIAL') }}"
    ></video-chat>
{{--    <video-chat :user="{{ $user }}" :others="{{ $others }}" pusher-key="{{ config('broadcasting.connections.pusher.key') }}" pusher-cluster="{{ config('broadcasting.connections.pusher.options.cluster') }}"></video-chat>--}}
@endsection
