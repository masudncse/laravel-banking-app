@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Transaction</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        @if(Session::has('update_message'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('update_message') }}
                            </div>
                        @endif

                        <form action="{{url('transactions/'.$transaction->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label>Bank Name</label>
                                <select class="form-control" name="bank_id" autofocus="">
                                    <option selected value="{{$transaction->bank->id}}">{{$transaction->bank->bank_name}}</option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description">{{$transaction->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td style="width: 50%; border: none;">
                                            <label>Deposit</label>
                                            <input type="text" name="deposit" class="form-control" value="{{$transaction->deposit?:'0.00'}}" placeholder="Enter deposit amount">
                                        </td>
                                        <td style="width: 50%; border: none;">
                                            <label>Withdraw</label>
                                            <input type="text" name="withdraw" class="form-control" value="{{$transaction->withdraw?:'0.00'}}" placeholder="Enter withdraw amount">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








