<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Urban News</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/modern-business.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
<a href="/" class="unlink-text">
    <div class="header-logo">
        <div class="logo-name">
            <h1>Urban News</h1>
        </div>
    </div>
</a>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #000521">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">UrbanNews.com.ua</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/">Новости</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Full Width Page</a>
                        </li>
                        <li>
                            <a href="#">Sidebar Page</a>
                        </li>
                        <li>
                            <a href="#">FAQ</a>
                        </li>
                        <li>
                            <a href="#">404</a>
                        </li>
                        <li>
                            <a href="#">Pricing Table</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown navbar-form input-group">
                        <input type="text" id="searchBar" class="form-control dropdown-toggle" data-toggle="dropdown">
                        <ul class="dropdown-menu" id="tagSearch" style="margin-right: 90px">
                        </ul>
                        <span class="input-group-btn form-group">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

@yield('content')

<hr>
<!-- Footer -->
<div class="container">
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Urban News 2017</p>
            </div>
        </div>
    </footer>
</div>

<!-- /.container -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });

    $(document).ready(function(){

        /*-------------------------------------------------------------------------------------------*/
        /*----------------------------|Счетчик просмотров новостей|----------------------------------*/
        /*-------------------------------------------------------------------------------------------*/
        @if(isset($oneNews->id)) // Если это страница вывода одной новости (присутсвует $oneNews)
        var readNow = $('#rd-now');
        readNow.ready(function (){
            var news_id = {{ $oneNews->id }} // айди нвости

            // Функция запуска с интервалом
            setTimeout(function(){
                read(); // Запуск функции вставки
                setTimeout(arguments.callee,5000);
            }, 400);

            // Функция вставки
            function read (){
                var random = getRandomInRange(1, 5);
                // Делаем запрос, передаем туда кол-во пользователей читающих эту новость (через ген случайных
                // чисел). Получаем обратно общее количество просмотров за все время.
                $.post('/news/viewed',{id: news_id, watch_now: random}).done(function (data) {
                    $('#rd-count').text(data); // Читающих за все время
                });
                readNow.text(random); // Читающих сейчас
            }

            function getRandomInRange(min, max){
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

        });
        @endif

        /*-------------------------------------------------------------------------------------------*/
        /*----------------------------------|Строка поиска|------------------------------------------*/
        /*-------------------------------------------------------------------------------------------*/

        var srch = $('#searchBar');
        srch.keyup(function(){ // При вводе символов строку поиска
            $.post('/search', {letters: srch.val()}).done(function (data) {
                var allTags = JSON.parse(data); // Записываем полученные данные
                searchInLine(allTags);  // Запускаем функцию вставки найденных совпавдений
            });

            function searchInLine(allTags) {
                $('#tagSearch').children().remove(); // При изменении в строке убираем все совпадения
                if (allTags[0]){ // Если колекция не пустая
                    $.each(allTags, function (key, value) {
                        var a = document.createElement('a'); // создаем тег ссылки
                        a.href = "/news/tags/" + value.id;
                        a.innerText = value.name;

                        var li = document.createElement('li');

                        li.append(a);
                        $('#tagSearch').append(li); // Вывод списка найденных совпадений
                    });
                }

            }
        });

        /*-------------------------------------------------------------------------------------------*/
        /*------------------------|Подтверждение при закрытии вкладки|-------------------------------*/
        /*-------------------------------------------------------------------------------------------*/

        window.onbeforeunload = function() {return "really leave now?"}; // ? Не выводит сообщение
        $(document).ready(function() {
            $('a[rel!=ext]').click(function() { window.onbeforeunload = null; });
            $('form').submit(function() { window.onbeforeunload = null; });
        });

    });




    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>

</html>