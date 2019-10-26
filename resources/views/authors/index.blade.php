@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
<<<<<<< HEAD
                <li><a href="{{ url('/') }}">Dashboard</a></li>
=======
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
                <li class="active">Penulis</li>
                </ul>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h2 class="panel-title">Penulis</h2>
                    </div>
                    <div class="panel-body">
<<<<<<< HEAD
                        <p> <a class="btn btn-primary" href="{{ route('authors.create') }}">Tambah</a> </p>
=======
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
                        {!! $html->table(['class'=>'table-striped']) !!}
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! $html->scripts() !!}
@endsection