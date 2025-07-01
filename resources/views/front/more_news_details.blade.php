@extends('template')

@section('content')

@livewire('front.more-news-details',['newsId'=>$newsId])

@endsection