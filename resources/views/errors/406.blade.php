@extends('layouts.errors')

@section('code')
    {{ __('406')}}
@endsection
@section('content')
    {{ __($exception->getMessage()) }}
@endsection
