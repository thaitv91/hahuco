@extends('layouts.app')

@section('content')
    <!-- main content -->

    @if($page->getContentofField("chitiet-boithuong-huong-dan-boi-thuong"))
        @widget($page->getContentofField("chitiet-boithuong-huong-dan-boi-thuong"))
    @endif

    @if($page->getContentofField("chitiet-boithuong-ho-so"))
        @widget($page->getContentofField("chitiet-boithuong-ho-so"))
    @endif
    @if($page->getContentofField("chitiet-boithuong-ho-so-boi-thuong-xe"))
        @widget($page->getContentofField("chitiet-boithuong-ho-so-boi-thuong-xe"))
    @endif
    @if($page->getContentofField("chitiet-boithuong-cham-soc-khach-hang"))
        @widget($page->getContentofField("chitiet-boithuong-cham-soc-khach-hang"))
    @endif
    <!-- e: main content -->
@endsection