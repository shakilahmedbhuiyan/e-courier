@extends('layouts.errors')

@section('code')
    {{ __('304')}}
@endsection
@section('content')
    {{ __($exception->getMessage()) }}
@endsection
