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
                <fieldset>
                    <legend>Current Status</legend>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Bank Name</th>
                            <th>Total Deposit</th>
                            <th>Total Withdraw</th>
                            <th>Balance</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $balance = 0;


                        ?>

                        @foreach($transactions as $transaction)
                            <?php
                            $balance +=$transaction->total_deposit;
                            $balance -=$transaction->total_withdraw;
                            ?>
                            <tr>
                                <td>{{$transaction->bank_name}}</td>
                                <td>{{number_format($transaction->total_deposit)}}</td>
                                <td>{{number_format($transaction->total_withdraw)}}</td>
                                <td>{{number_format($balance)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4">
                                <?php

                                $dataPoints = array();

                                foreach($transactions as $transaction){
                                    $dataPoints[] = array("y"=>($transaction->total_deposit - $transaction->total_withdraw), "label"=>$transaction->bank_name);
                                }


                                /*$dataPoints = array(
                                        array("y" => 6, "label" => "Apple"),
                                        array("y" => 4, "label" => "Mango"),
                                        array("y" => 5, "label" => "Orange"),
                                        array("y" => 7, "label" => "Banana"),
                                );*/
                                ?>

                                <div id="chartContainer" style="width: 100%; height: 180px;"></div>

                                <script type="text/javascript">

                                    $(function () {
                                        var chart = new CanvasJS.Chart("chartContainer", {
                                            theme: "theme2",
                                            animationEnabled: true,
                                            title: {
                                                text: "Balance Status"
                                            },
                                            data: [
                                                {
                                                    type: "column",
                                                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                                }
                                            ]
                                        });
                                        chart.render();
                                    });
                                </script>
                            </td>
                        </tr>

                        </tfoot>
                    </table>

                </fieldset>
            </div>
        </div>
    </div>

@endsection








