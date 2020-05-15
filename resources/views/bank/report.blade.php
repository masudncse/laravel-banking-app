@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <fieldset>
                    <legend>Bank Report</legend>
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
                                    <a class="btn btn-info" href="{{url('/editBank/'.$bank->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <form method="POST" action="{{ url('/deleteBank/'.$bank->id) }}" class="pull-left" style="margin-right: 10px;">
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                                    </form>

                                    <button type="button" id="delete-ajax" class="btn btn-info">Ajax Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">{{ $banks->links() }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#delete-ajax').click(function(){
                $.ajax({
                    url: '{{url('/ajax')}}',
                    type: 'DELETE',
                    data: {
                        '_method': 'DELETE',
                        'name':'Hello Masud'
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>

@endsection








