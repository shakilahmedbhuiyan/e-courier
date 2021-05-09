@extends('layouts.errors')


@section('code')
    {{ __($exception->getStatusCode())}}
@endsection
@section('content')
    <div>
        <small class="text-muted text-capitalize text-sm font-size-25 playfair">Something is broken. Please let us know what you were doing when this error occurred. We will fix it as
            soon as possible. Sorry for any inconvenience caused.</small>
    </div>
@endsection
