@extends('layouts.app')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="" method="post" action="{{ route('feedback.store') }}">
        <!-- CROSS Site Request Forgery Protection -->
        @csrf
        <div class="form-group">
            <label>Имя</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label>Сообщение</label>
            <textarea class="form-control" name="message" id="message" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label>Телефон</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <input type="submit" name="send" value="Отправить" class="btn btn-dark btn-block">
    </form>
</div>
</body>

@endsection
