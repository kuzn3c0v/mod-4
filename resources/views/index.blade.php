
@extends('layouts.layout')

@section('content')



<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Блоги -->
        <div class="col-md-3">
            <a href="/blogs/" class="section-header">
                <h2 class="page-header"><i class="fa fa-paperclip fa-1x"></i> Блоги</h2>
            </a>

            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- Карусель с топ новостями -->
        <div class="col-md-6">
            <a href="/news/" class="section-header">
                <h2 class="page-header"><i class="fa fa-star fa-1x"></i> Топ новости</h2>
            </a>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides 750х500-->
                <div class="carousel-inner">
                    <!-- {{$active = 1}} -->
                    @foreach($data as $news)
                        <div class="item @if($active)active @endif">
                            {{$active = null}}
                            <a href="{{ route('newsShow', ['id' => $news->id]) }}" class="unlink-text">
                                <div class="carousel-news-header">
                                    <h3>{{ $news->title }}</h3>
                                </div>
                                <img class="img-hover img-responsive" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->img_title) }}" alt="">
                                <div class="carousel-desc">{!! mb_substr($news->text, 0, 250) !!}...</div>
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

            <a href="/news/" class="section-header">
                <h2 class="page-header"><i class="fa fa-list-alt fa-1x"></i> Последние новости</h2>
            </a>

            <div class="panel panel-default all-news-panel">

                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-header">
                        <li class="active"><a href="#home" data-toggle="tab">Украина</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Мир</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">Науки и техника</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">Спорт</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            @foreach($data as $news)
                                <div class="list-group" style="margin: 0; border-radius:0">
                                    <a href="{{ route('newsShow', ['id' => $news->id]) }}" class="list-group-item" style="height: 80px; border-radius:0">
                                        <img class="img-responsive img-news-tabs" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->img_title) }}" alt="">
                                        <small>{{ date_format($news->created_at, 'd-m-Y H:i:s') }}</small>
                                        <p>
                                            <strong>{{ $news->title }}</strong>
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <a class="btn btn-blog-index btn-lg btn-block" href="/blogs/">Новости Украины</a>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            @foreach($data as $news)
                                <div class="list-group" style="margin: 0; border-radius:0">
                                    <a href="{{ route('newsShow', ['id' => $news->id]) }}" class="list-group-item" style="height: 80px; border-radius:0">
                                        <img class="img-responsive img-news-tabs" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->img_title) }}" alt="">
                                        <small>{{ date_format($news->created_at, 'd-m-Y H:i:s') }}</small>
                                        <p>
                                            <strong>{{ $news->title }}</strong>
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <a class="btn btn-blog-index btn-lg btn-block" href="/blogs/">Новости мира</a>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            @foreach($data as $news)
                                <div class="list-group" style="margin: 0; border-radius:0">
                                    <a href="{{ route('newsShow', ['id' => $news->id]) }}" class="list-group-item" style="height: 80px; border-radius:0">
                                        <img class="img-responsive img-news-tabs" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->img_title) }}" alt="">
                                        <small>{{ date_format($news->created_at, 'd-m-Y H:i:s') }}</small>
                                        <p>
                                            <strong>{{ $news->title }}</strong>
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <a class="btn btn-blog-index btn-lg btn-block" href="/blogs/">Новости мира</a>
                        </div>
                        <div class="tab-pane fade" id="settings">
                            @foreach($data as $news)
                                <div class="list-group" style="margin: 0; border-radius:0">
                                    <a href="{{ route('newsShow', ['id' => $news->id]) }}" class="list-group-item" style="height: 80px; border-radius:0">
                                        <img class="img-responsive img-news-tabs" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->img_title) }}" alt="">
                                        <small>{{ date_format($news->created_at, 'd-m-Y H:i:s') }}</small>
                                        <p>
                                            <strong>{{ $news->title }}</strong>
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <a class="btn btn-blog-index btn-lg btn-block" href="/blogs/">Новости мира</a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>


        </div>
        <div class="col-md-3">
            <h2 class="page-header"><i class="fa fa-bar-chart-o fa-1x"></i> Голосование</h2>

            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>


@endsection


