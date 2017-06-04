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
                <i class="fa fa-clock-o"></i> Опубликовано {{ $oneNews->created_at->format('d-m-Y H:i:s') }}
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
                <div class="tag-cont">
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
            @if (Auth::guest())
                <div class="well"><a href="{{ route('login') }}">Войдите</a>  или <a href="{{ route('register') }}">зарегистрируйтесь</a> чтобы оставлять комментарии</div>

            @else()
            {!! Form::open(['route' => 'postComment']) !!}

            {{ Form::hidden('news_id', $oneNews->id) }}

            <div class="well">
                <h4>Комментарии:</h4>
                <form role="form">
                    <div class="form-group">
                        {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Оставьте комментарий']) !!}
                    </div>
                    {{ Form::submit('Отправить', ['class' => 'btn btn-primary']) }}
                </form>
            </div>

            {!! Form::close() !!}
            @endif

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->

            @if(count($comments))
                @foreach($comments as $com)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $com->find_user()->first()->name }}
                                <small>{{ $com->created_at->format('d-m-Y H:i:s') }}</small>
                            </h4>
                            {{ $com->comment }}
                        </div>
                    </div>
                @endforeach
            @else
                <p>Комментариев нет. Будьте первым кто оставит комментарий.</p>
            @endif


        </div>

        <!-- Реклама -->
        <div class="col-md-3">

            @include('adv')

        </div>

    </div>
    <!-- /.row -->
</div>

@endsection