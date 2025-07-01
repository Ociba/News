@extends('template')

@section('content')

@livewire('front.category-details',['categoryId'=>$categoryId])

@endsection