@extends('layouts.app')

@section('content')
    <zoom-meet :nickname="`{{ $nickname }}`" :meetingId="`{{ $meetConfig['id'] }}`" :password="`{{ $meetConfig['password'] }}`" ></zoom-meet>
@endsection


