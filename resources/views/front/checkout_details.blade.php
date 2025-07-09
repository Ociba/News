@extends('template')

@section('content')

@livewire('front.checkout-photo-details',['photoId' =>$photoId])

@endsection