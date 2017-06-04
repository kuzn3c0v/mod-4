
@extends('layouts.layout')

@section('content')



<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Реклама -->
        <div class="col-md-3">

            <h2 class="page-header"> Реклама</h2>

            @include('adv')

        </div>

        <div class="col-md-6">

            <h2 class="page-header"><i class="fa fa-star fa-1x"></i> Топ новости</h2>

            <!-- Карусель с топ новостями -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides 750х500-->
                <div class="carousel-inner">
                    <!-- {{$active = 1}} -->
                    @foreach($carousel as $carNews)
                        <div class="item @if($active)active @endif">
                            {{$active = null}}
                            <a href="{{ route('oneNews', ['id' => $carNews->id]) }}" class="unlink-text">
                                <div class="carousel-news-header">
                                    <h3>{{ $carNews->title }}</h3>
                                </div>
                                <img class="img-hover img-responsive" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $carNews->img_title) }}" alt="">
                                <div class="carousel-desc">{!! mb_substr($carNews->text, 0, 260) !!}...</div>
                            </a>
                        </div>
                    @endforeach
                </div>

                    <!-- Controls -->
                    <a class="left carousel-control border-rad" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control border-rad" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
            </div>
            <!-- /.Карусель с топ новостями -->


            <h2 class="page-header"><i class="fa fa-list-alt fa-1x"></i> Последние новости</h2>

            <!-- Последние новости по категориям -->
            <div class="panel panel-default all-news-panel">

                <div class="panel-body">
                    <!-- Вкладки категорий новостей -->
                    <ul class="nav nav-tabs tabs-header">
                    <!-- {{ $active = true }} -->
                    @foreach($newsCategories as $category)
                            <li @if($active) class="active" @endif>
                                <a href="#{{ $category->desc }}" data-toggle="tab">{{ $category->categories }}</a>
                            </li>
                    <!-- {{ $active = false }} -->
                    @endforeach
                    </ul>
                    <!-- /.Вкладки категорий новостей -->

                    <!-- Список новостей -->
                    <div class="tab-content">
                        <!-- {{ $active = true }} -->

                        @foreach($newsCategories as $news)
                            <div class="tab-pane fade @if($active)  in active @endif " id="{{ $news->desc }}">

                                @foreach($news['newsList'] as $oneNewsCat)
                                <div class="list-group news-list">
                                    <a href="{{ route('oneNews', ['id' => $oneNewsCat->id]) }}" class="list-group-item" style="height: 80px; border-radius:0">
                                        <img class="img-responsive img-news-tabs" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $oneNewsCat->img_title) }}" alt="">
                                        <small>{{ date_format($oneNewsCat->created_at, 'd-m-Y H:i:s') }}</small>
                                        <p>
                                            <strong>{{ $oneNewsCat->title }}</strong>
                                        </p>
                                    </a>
                                </div>
                                @endforeach

                                <a class="btn btn-goto-cat btn-lg btn-block" href="{{ route('newsByCat', ['cat' => $news->desc]) }}">Перейти в раздел "{{ $news->categories }}"</a>
                            </div>
                            <!-- {{ $active = false }} -->
                        @endforeach

                    </div>
                    <!-- /.Список новостей -->
                </div>
            </div>
            <!-- /.Последние новости по категориям -->
        </div>

        <div class="col-md-3">
            <h2 class="page-header"> Реклама</h2>

            @include('adv')

        </div>
    </div>
</div>


@endsection


