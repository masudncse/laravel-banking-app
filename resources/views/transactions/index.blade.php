@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <fieldset>
                    <legend> Transaction View </legend>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Bank Name</th>
                            <th>Description</th>
                            <th>Deposit</th>
                            <th>Withdraw</th>
                            <th>Balance</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                                $balance = 0;
                        $i = 1;
                        ?>

                        @foreach($transactions as $transaction)
                            <?php

                                    if($transaction->deposit > 0){
                                        $balance += $transaction->deposit;
                                    }elseif($transaction->withdraw > 0){
                                        $balance -= $transaction->withdraw;
                                    }
                                    else{
                                        $balance += $transaction->deposit;
                                        $balance -= $transaction->withdraw;
                                    }


                            ?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$transaction->bank->bank_name}}</td>
                            <td>{{ $transaction->description }}</td>
                            <td>{{number_format($transaction->deposit)}}</td>
                            <td>{{number_format($transaction->withdraw)}}</td>
                            <td>{{ number_format($balance) }}</td>
                            <td>
                                <a class="btn btn-info" href="{{url('transactions/'.$transaction->id.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i></a>

                                <form action="{{url('transactions/'.$transaction->id)}}" method="post" class="pull-left" style="margin-right: 10px;">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-remove"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>

@endsection








