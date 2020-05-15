@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">New Transaction</h3>
                    </div>
                    <div class="panel-body">

                        @include('common.errors')

                        @if(Session::has('confirmation_message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('confirmation_message') }}
                            </div>
                        @endif

                        <form action="{{url('transactions')}}" method="post">
                            {{csrf_field()}}
                            {{method_field('POST')}}
                            <div class="form-group">
                                <label>Bank Name</label>
                                <select class="form-control" name="bank_id" autofocus="">
                                    <option selected value=""></option>
                                    @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td style="width: 50%; border: none;">
                                            <label>Deposit</label>
                                            <input type="text" name="deposit" class="form-control" value="{{ old('deposit') ?: '0.00' }}" placeholder="Enter deposit amount">
                                        </td>
                                        <td style="width: 50%; border: none;">
                                            <label>Withdraw</label>
                                            <input type="text" name="withdraw" class="form-control" value="{{old('withdraw')?:'0.00'}}" placeholder="Enter withdraw amount">
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








