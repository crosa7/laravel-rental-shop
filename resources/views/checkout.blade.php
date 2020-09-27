@extends('base')

@section('main')
<checkout-page :cart="{{ $cart }}"></checkout-page>
@endsection
