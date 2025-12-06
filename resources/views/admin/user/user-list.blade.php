@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="min-height: 234px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>user</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">user</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-none">
                        <h3 class="card-title">user</h3>
                    </div>
                    <div class="card-body">
                        @if(session()->has('error_msg'))
                        <div class="alert alert-error error text-center" role="alert">
                            {{ session()->get('error_msg') }}
                        </div>
                        @endif
                        @if(session()->has('success_msg'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session()->get('success_msg') }}
                        </div>
                        @endif
                        <form class="" method="GET" action="{{ route('admin.user') }}" style="display: inline-block">
                            <input type="text" name="search" id="search" placeholder="Search" value="{{request()->input('search')}}">
                            {{-- <input type="date" name="start_date" id="start_date">
                            <input type="date" name="end_date" id="end_date"> --}}
                            <button type="submit" class="btn bg-gradient-primary">Search</button>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Reset Login</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($user_list) && is_object($user_list) && $user_list)
                                @foreach($user_list as $value)
                                <tr>
                                    <td>{{ isset($value->name) &&  !empty($value->name) ? $value->name  :  '' }}
                                    </td>

                                    <td>{{ isset($value->email) &&  !empty($value->email) ? $value->email  :  '' }}
                                    </td>
                                    <td>{{ isset($value->mobile_no) &&  !empty($value->mobile_no) ? $value->mobile_no  :  '' }}
                                    </td>
                                    <td><a href="{{ route('admin.user.reset.login',['id'=>$value->id]) }}" class="reset_login" data-id="{{ $value->id }}">Reset Login
                                     </a></td>
                             
                                    <td>

                                   
                                     <a href="{{ route('admin.user.delete',['id'=>$value->id]) }}" class="del_data" data-id="{{ $value->id }}"><i class="fa fa-trash" aria-hidden="true"></i>
                                     </a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>

                        {{ isset($user_list) && is_object($user_list) ? $user_list->links(): '' }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        $(document).on('click','.del_data',function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            Notiflix.Confirm.Show( 'Notiflix Confirm', 'Do you Really Want To Delete?', 'Yes', 'No', function(){ 
            var del_id = $(this).attr('data-id');
            // window.location.href = link;

            $.ajax({
                            url: link,
                            type: "post",
                            data: {
                                id: del_id,
                                "_token": "{{ csrf_token() }}",
                                
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                alert("Something went wrong please try again");
                            }
                        });

            }, function(){ 
                //no function
           } ); 
        });
        $(document).on('click','.reset_login',function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            Notiflix.Confirm.Show( 'Notiflix Confirm', 'Do you Really Want To Reset Login?', 'Yes', 'No', function(){ 
            var del_id = $(this).attr('data-id');
            // window.location.href = link;

            $.ajax({
                            url: link,
                            type: "post",
                            data: {
                                id: del_id,
                                "_token": "{{ csrf_token() }}",
                                
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                alert("Something went wrong please try again");
                            }
                        });

            }, function(){ 
                //no function
           } ); 
        });

    });
</script>
@endsection