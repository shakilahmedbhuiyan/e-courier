@extends('layouts.errors')

@section('code')
    {{ __('404')}}
@endsection
@section('content')
    {{ __($exception->getMessage()) }}
@endsection
