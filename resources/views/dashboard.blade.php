@extends('layouts.app')

@section('content')

    <style>

        .panel-title{
            font-weight: bold;
        }

        ul.dash-icon{
            padding-left: 0;
            list-style: none;
            display: block;
        }

        ul.dash-icon li{
            width: 31.9%;
            font-size: 20px;
            float: left;
            height: 115px;
            padding: 25px 10px 10px;
            line-height: 1.4;
            text-align: center;
            background-color: #f9f9f9;
            border: 1px solid #fff;
            margin-right: 10px;
        }

        ul.dash-icon li i{
            font-size: 30px;
            display: block;
            padding-bottom: 10px;
        }

        ul.dash-icon li a{
            text-decoration: none;
            color: #ffffff;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Transaction Report</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="dash-icon">
                            <li style="background-color: #0078d7;">
                                <a href="{{ url('/createBank') }}">
                                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                    New Bank
                                </a>
                            </li>
                            <li style="background-color: #dc3c00;">
                                <a href="{{url('transactions/create')}}">
                                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                    New Transaction
                                </a>
                            </li>
                            <li style="background-color: #813a7d;">
                                <a href="{{url('status')}}">
                                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                                    Bank Status
                                </a>
                            </li>
                        </ul>


                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <table class="table table-bordered table-striped">
                            <caption>Latest 3 items</caption>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








