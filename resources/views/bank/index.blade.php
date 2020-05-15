@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Bank</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        @if(Session::has('delete_message'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('delete_message') }}
                            </div>
                        @endif

                        <form method="post" action="{{ url('/createBank') }}">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input style="width: 40%;" type="text" name="bank_name" value="{{old('bank_name')}}" class="form-control" autofocus="">
                            </div>
                            <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Bank Name</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1 ?>
                    @foreach($banks as $bank)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $bank->bank_name }}</td>
                            <td>

                                <form method="POST" action="{{ url('/deleteBank/'.$bank->id) }}" class="pull-left" style="margin-right: 10px;">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
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