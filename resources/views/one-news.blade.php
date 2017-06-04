@extends('layouts.layout')

@section('content')

<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-list-alt fa-1x"></i> {{ $cat->categories }}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Главная</a>
                </li>
                <li><a href="/news/{{ $cat->desc }}">{{ $cat->categories }}</a>
                </li>
                <li class="active">{{ $oneNews->title }}</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">
            <h3 style="margin: 0 0 20px 0">{{ $oneNews->title }}</h3>

            <!-- Blog Post -->

            <!-- Preview Image -->
            <div class="img-news col-md-6">
                <img class="img-responsive" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $oneNews->img_title) }}" alt="">
                <!-- Date/Time -->
                <div style="background-color: whitesmoke; color: black; padding-left: 5px; border-radius: 0 0 4px 4px">
                <i class="fa fa-clock-o"></i> Опубликовано {{ date_format($oneNews->created_at, 'd-m-Y H:i:s') }}
                </div>
            </div>


            <!-- Post Content -->
            {!! $oneNews->text !!}

            <hr>
            <!-- Кол-во читающих новость -->
            <div class="tag-cont">
                <i class="fa fa-eye"></i>
                Читают эту новость <span class="badge" id="rd-now"></span>
                Всего просмотров <span class="badge" id="rd-count"></span>

            </div>

            <!-- Тэги новостей -->
            @if(count($tag))
                <div class="tag-cont">   <!-- todo убрать тег p -->
                    <strong style="margin-right: 5px">Теги: </strong>
                    @foreach($tag as $t)
                        <form action="/news/tags/{{ $t->id }}" style="display: inline-block">
                            <button type="submit" class="btn btn-outline btn-primary btn-xs">{{ $t->name }}</button>
                        </form>
                    @endforeach
                </div>
            @endif



            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin                         commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum                     nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante                                      sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra                                  turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis                             in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <!-- Blog Search Well -->
            <div class="well" style="background-color: #000521; color: white">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
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
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->
</div>

@endsection