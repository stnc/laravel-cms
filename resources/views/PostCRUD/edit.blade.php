@extends('layouts.master')


@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit New Item</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {!! Form::model($Posts, ['method' => 'PATCH','route' => ['posts.update', $Posts->id]]) !!}

    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {!! Form::text('post_title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                {!! Form::textarea('post_content', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>


    </div>

    {!! Form::close() !!}


@endsection