@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Bank</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        @if(Session::has('update_message'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('update_message') }}
                            </div>
                        @endif

                        <form method="post" action="{{ url('/updateBank/'.$bank->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input style="width: 40%;" type="text" name="bank_name" value="{{ $bank->bank_name }}" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-danger">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection