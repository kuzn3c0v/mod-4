
@extends('layouts.layout')

@section('content')

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-list-alt fa-1x"></i> {{ $catId->categories }}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Главная</a>
                </li>
                <li class="active">{{ $catId->categories }}</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- News list -->
    <div class="row">
        <div class="col-lg-9" >
            @foreach($news as $onenews)
                <div class="row all-news-row">
                    <a href="{{ route('oneNews', ['id' => $onenews->id]) }}" class="unlink-text">
                        <div class="img-news col-md-3">
                            <img class="img-responsive img-hover" src="{{ asset('pictures' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . $onenews->img_title) }}" alt="">
                        </div>

                        <div class="all-news-content">
                            <h3 class="all-news-title">{{ $onenews->title }}</h3>
                            <h5><i class="fa fa-clock-o"></i> {{ date_format($onenews->created_at, 'd-m-Y H:i:s') }}</h5>

                            <!-- Post Content -->
                            <p>{!! mb_substr($onenews->text, 0, 150) !!}...</p>
                        </div>
                    </a>
                </div>
                <hr>

            @endforeach
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

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Primary Panel
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                </div>
                <div class="panel-footer">
                    Panel Footer
                </div>
            </div>
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
</div>

@endsection