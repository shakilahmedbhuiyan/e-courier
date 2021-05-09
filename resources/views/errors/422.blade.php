@extends('layouts.errors')

@section('code')
    {{ __($exception->getStatusCode())}}
@endsection
@section('content')
    {{ __($exception->getMessage()) }}
@endsection
