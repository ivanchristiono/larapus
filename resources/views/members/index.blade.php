@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="active">Member</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Member</h2>
                    </div>
                    <div class="panel-body">
                        <!-- <p> <a class="btn btn-primary" href="{{ url('/admin/members/create') }}">Tambah</a> </p> -->
                       <p> <button class="btn btn-primary" data-toggle="modal" data-target="#createMember">Tambah</button> </p>
                        {!! $html->table(['class'=>'table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal CREATE DATA MEMBER-->
    <div class="modal fade" id="createMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => route('members.store'),
                    'method' => 'post', 'files' => true, 'class'=>'form-horizontal']) !!}
                    @include('members._form')
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
    {!! $html->scripts() !!}
@endsection