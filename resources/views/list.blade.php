@extends('base')

@section('main')
<product-list-page :cart="{{ $cart }}"></product-list-page>
@endsection
