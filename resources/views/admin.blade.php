@extends('layout.adm')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i = 0; $i<count($users); $i++)
                            <tr id="user-row-a-{!! $i !!}" data-id="{!! $users[$i]->user_id !!}" onclick="viewUser({!! $i !!})">
                                <td>{!! $users[$i]->name !!}</td>
                                <td>{!! $users[$i]->email !!}
                                </td>
                            </tr>
                            @endfor


                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
    </div>
    <div class="col-md-7">

    </div>
    </div>


    @endsection