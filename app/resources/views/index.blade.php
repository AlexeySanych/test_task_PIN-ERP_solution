<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{route('index')}}/css/style.css">
    <title>Products</title>
</head>
<body class="body">
    <div class="wrapper">
        <div class="side-menu">
            <div class="logo">
                <div class="logo__img"><img src="{{route('index')}}/img/logo.svg"></div>
                <div class="logo__txt">
                    <p>Enterprise<br>
                        Resource<br>
                        Planning</p>
                </div>
            </div>
            <nav class="side-menu__nav">
                <a class="side-menu__item" href="#">Продукты</a>
            </nav>
        </div>
        <div class="container">
            <header class="header">
                <nav class="header__nav" >
                    <a class="header__nav-item active" href="#">ПРОДУКТЫ</a>
                </nav>
                <p class="user" >
                    @if(session('username'))
                           {{session('username')}}
                    @else
                        Гость
                    @endif
                </p>
            </header>
            <main class="main">
                <div class="products">
                    <h1 class="visually-hidden">Продукты</h1>
                    <table class="products_table">
                        <thead class="products_table-head">
                        <tr>
                            <th>Артикул</th>
                            <th>Название</th>
                            <th>Статус</th>
                            <th>Атрибуты</th>
                        </tr>
                        </thead>
                        <tbody class="products_table-body">
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->article}}</td>
                                <td>
                                    <a data-href="{{route('show', $product->id)}}">{{$product->name}}</a>
                                </td>
                                <td>
                                    @if($product->status == 'available')Доступен@endif
                                    @if($product->status == 'unavailable')Не доступен@endif
                                </td>
                                <td>
                                    @isset($product->data)
                                        @foreach($product->data as $key=>$value)
                                            <p>{{$key}}: {{$value}}</p>
                                        @endforeach
                                    @endisset
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="add-button-wrapper">
                    <button class="add-button" data-href="{{route('create')}}">Добавить</button>
                </div>
            </main>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
