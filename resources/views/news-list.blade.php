
@extends('layouts.layout')

@section('content')

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">

            @if(isset($section->categories))
                <!-- {{ $header = $section->categories }} -->
            @else
                <!-- {{ $header = 'Все новости по тегу : ' . $section->name }} -->
            @endif

            <h1 class="page-header"><i class="fa fa-list-alt fa-1x"></i> {{ $header }}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Главная</a>
                </li>
                <li class="active">{{ $header }}</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- News list -->
    <div class="row">
        <div class="col-lg-9" >
            @foreach($news as $one)
                <div class="row all-news-row">
                    <a href="{{ route('oneNews', ['id' => $one->id]) }}" class="unlink-text">
                        <div class="img-news col-md-3">
                            <img class="img-responsive img-hover" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $one->img_title) }}" alt="">
                        </div>

                        <div class="all-news-content">
                            <h3 class="all-news-title">{{ $one->title }}</h3>
                            <h5><i class="fa fa-clock-o"></i> {{ $one->created_at->format('d-m-Y H:i:s') }}</h5>

                            <!-- Post Content -->
                            <p>{!! mb_substr($one->text, 0, 150) !!}...</p>
                        </div>
                    </a>
                </div>
                <hr>

            @endforeach
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            @include('adv')
        </div>
    </div>


    <!-- /.row -->
    <hr>


    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            {{ $news->links() }}
        </div>
    </div>
    <!-- /.Pagination -->

</div>

@endsection