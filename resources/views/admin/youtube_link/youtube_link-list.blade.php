@extends('layouts.admin')

@section('content')

<div class="content-wrapper" style="min-height: 234px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Youtube Link</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Youtube Link</li>
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
                        <h3 class="card-title">Youtube Link</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.youtube_link.add') }}"
                            class="btn bg-gradient-primary  float-right">Add</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Youtube Link</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($youtube_link_list) && is_object($youtube_link_list))
                                @foreach($youtube_link_list as $value)
                                <tr>
                                    <td>{{ isset($value->name) &&  !empty($value->name) ? $value->name  :  '' }}</td>
                                    <td>{{ isset($value->youtube_link) &&  !empty($value->youtube_link) ? $value->youtube_link  :  '' }}
                                    </td>
                                    <td>{{ isset($value->description) &&  !empty($value->description) ? $value->description  :  '' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.youtube_link.edit',['id'=>$value->id]) }}"
                                            title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-youtube-link="{{ $value->id }}"
                                            title="delete" class="delete-youtube-link">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
    
        $('.delete-youtube-link').on('click',function(){
            youtube_link_id =  $(this).data('youtube-link');
            if(confirm('Do you really want to delete this Youtube Link')){
                $.ajax({
                    url:"{{ route('admin.youtube_link.delete') }}",
                    type:"POST",
                    data:{
                        youtube_link_id:youtube_link_id,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(data){
                        alert('Youtube link Deleted successfully');
                        window.location.reload();
                    },
                    error:function(data){
                        alert('Something went wrong  please try again');
                    }
                });
            }
        });
    });
</script>
@endsection