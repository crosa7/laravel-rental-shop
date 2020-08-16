@extends('base')

@section('main')
<product-list-page :products="{{ $products }}"></product-list-page>
@endsection
