@extends('template')

@section('content')

@livewire('front.category-details',['newsId'=>$newsId])

@endsection