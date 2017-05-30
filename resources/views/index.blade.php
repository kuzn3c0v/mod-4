
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

            <!-- Список последних записей в блогах -->
            <div class="well" style="background-color: #000521; padding: 1px; height: 625px">
                <div class="list-group" style="margin: 0">

                    <a href="#" class="list-group-item" style="height: 115px; border-color: #000521">
                        <div class="avatar">
                        <img src="http://ic.pics.livejournal.com/shadberry_game/69190420/203256/203256_900.jpg" alt="">
                        </div>
                        <strong>Агент Смит</strong><br>
                        <small>August 25, 2014 at 9:30 PM</small>
                        <p>
                            <strong>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et lacus fringilla, tincidunt sapien nec, posuere nunc.
                            </strong>
                        </p>
                    </a>
                    <a href="#" class="list-group-item" style="height: 115px; border-color: #000521">
                        <img class="avatar" src="http://ic.pics.livejournal.com/shadberry_game/69190420/203256/203256_900.jpg" alt="">
                        <strong>Бомж Дядя Вася</strong><br>
                        <small>August 25, 2014 at 9:30 PM</small>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et lacus fringilla, tincidunt sapien nec, posuere nunc.
                        </p>
                    </a>
                    <a href="#" class="list-group-item" style="height: 115px; border-color: #000521">
                        <div class="avatar">
                        <img class="img-circle" src="http://ic.pics.livejournal.com/silverlj/72202394/353282/353282_900.jpg" alt="">
                        </div>
                        <strong>Уолтер Уайт</strong><br>
                        <small>August 25, 2014 at 9:30 PM</small>
                        <p>
                            <?php  echo mb_strtoupper('Роль химии в современном мире'); ?>
                        </p>
                    </a>
                    <a href="#" class="list-group-item" style="height: 115px; border-color: #000521">
                        <div class="avatar">
                        <img src="http://minionomaniya.ru/wp-content/uploads/2016/01/%D0%BC%D0%B8%D0%BD%D1%8C%D0%BE%D0%BD%D1%8B-%D0%BF%D1%80%D0%B8%D0%BA%D0%BE%D0%BB%D1%8B-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8.jpg" alt="">
                        </div>
                        <strong>Агент Смит</strong>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et lacus fringilla, tincidunt sapien nec, posuere nunc.
                        </p>
                    </a>
                    <a href="#" class="list-group-item" style="height: 115px; overflow: hidden; border-color: #000521">
                        <img class="avatar img-circle" src="http://ic.pics.livejournal.com/shadberry_game/69190420/203256/203256_900.jpg" alt="">
                        <strong>Бомж Дядя Вася</strong>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et lacus fringilla, tincidunt sapien nec, posuere nunc.
                        </p>
                    </a>
                </div>
                <a class="btn btn-blog-index btn-lg btn-block" href="/blogs/">Блоги</a>
            </div>
        </div>
        <!-- Карусель с топ новостями -->
        <div class="col-md-6">
            <a href="/news/" class="section-header">
                <h2 class="page-header"><i class="fa fa-list-alt fa-1x"></i> Топ новости</h2>
            </a>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides 750х500-->
                <div class="carousel-inner">
                    <!-- {{$active = 1}} -->
                    @foreach($data as $news)
                    <div class="item @if($active)active @endif">
                        {{$active = null}}
                        <a href="{{route('newsShow', ['id' => $news->id])}}" class="unlink-text">
                            <div class="carousel-news-header">
                                <h3>{{$news->title}}</h3>
                            </div>
                            <img class="img-hover img-responsive" src="{{asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $news->img_url)}}" alt="">
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

            <div class="well" style="margin-top: 10px">
            <a class="btn btn-lg btn-default btn-block" href="/news/">Читать все новости</a>
            </div>
        </div>
        <div class="col-md-3">
            <h2 class="page-header"><i class="fa fa-bar-chart-o fa-1x"></i> Голосование</h2>

            <div class="well" style="background-color: #000521; color: white">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Поиск">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                </div>
                <!-- /.input-group -->
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


