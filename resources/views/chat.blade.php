@extends('layouts.app-chat')

@section('styles')

@endsection

@section('content')
    <div class="container-fluid" id="main-container">
        <chat></chat>
    </div>

    <form id="logout-form" :action="'/logout'" method="POST" class="d-none">
        @csrf
    </form>
@endsection

@push('scripts')

@endpush
