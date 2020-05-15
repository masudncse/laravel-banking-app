<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App: Bank Management 2017</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body background="{{asset('img/bg.jpg')}}">

<style>

    .table{
        background-color: #fdfdfd;
    }

    legend{
        background-color: #fdfdfd;
        padding: 10px;
    }

    .pagination{
        margin: 0;
    }

</style>



<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">Dashboard</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bank <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('/createBank')}}">New Bank</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('/viewBank')}}">All Bank Reports</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transactions <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('transactions/create')}}">New Transaction</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('transactions/')}}">All Transactions Report</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>


@yield('content')


</body>
</html>