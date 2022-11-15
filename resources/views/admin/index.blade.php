@extends('layouts.app')

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Имя</th>
                            <th scope="col">Сообщение</th>
                            <th scope="col">Email</th>
                            <th scope="col">Телефон</th>
                            <th scope="col">Отправить ответ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $feedbacks as $customer)
                            <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->message }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <form action="" method="post" action="{{ route('admin.send') }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" name="reply_message" id="reply_message" rows="2"></textarea>
                                        <input type="hidden" name="email" id="email" value="{{ $customer->email }}">
                                        <button type="submit" name="send" class="btn btn-dark ">Отправить</button>
                                    </div>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection





