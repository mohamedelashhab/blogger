@extends('dashboard.layouts.app')

@section('content')
    <table id="posts" class="table" >
 
        <thead>
            <tr>

              
                <th>id</th>
                <th>image</th>
                <th>title</th>
                <th>Edit</th>
                <th>delete</th>
                
                
            </tr>
        </thead>
        
        <tbody></tbody>
    </table>   

    <div class="row">
            <div style='position: absolute; center: 0;  padding: 0 0 0 0;'
             class="col-md-6 col-sm-6"><a href="{{route('dashboard.posts.create')}}"><button class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> Add New Post</button></a></div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
           
            var table = $("#posts").DataTable({
             
                "sScrollX": "100%",
                "sScrollXInner": "110%",
                "bScrollCollapse": true,
                "fixedColumns":   {
                "leftColumns": 1
                },
                processing: true,
                serverSide: true,
                "scrollX": true,
                "scrollY": 400,
                  
                    ajax:
                    {
                        url: "{{ route('dashboard.posts.list') }}",
                        type: 'GET',
                        
                    },
                    columns:
                    [
                       
                        {
                            data: "id",
                            "class": "data_id"
                       
                        },

                        {
                        data: "image",
                        "orderable": false,
                        "searchable":false,
                        "class" : "data",
                        render: function(data, type, row){
                            
                            return '<img src={!! asset("uploads/images") !!}' +'/'+ data +  ' width=100 height=50>';
                        }
                        },
                        
                        {
                            data: "title",
                            "class": "data"
                        
                        },
                        
                        {
                            data: "id",
                            "orderable": false,
                            "searchable":false,
                            
                            render: function (data, type, row) {
                                 return "<button class='btn-link js-update' data-id=" + data + ">Edit</button>";
                               
                            }
                        },
                        {
                            data: "id",
                            "orderable": false,
                            "searchable":false,
                            
                            render: function (data, type, row) {
                                 return "<button class='btn-danger js-delete' data-id=" + data + ">delete</button>";
                               
                            }
                        },
                        
                    ]
                });

            });




                $("#posts").on('click', '.js-update', function () {
                    var button = $(this);
            
                    window.location = "/dashboard/posts/" + button.attr("data-id") + "/edit";
                });

                $("#posts").on('click', '.js-delete', function () {
                    var button = $(this);
            
                    $.ajax(
                        {
                            url: "/dashboard/posts/" + button.attr("data-id") + "/delete",
                            method: "DELETE",
                            data:{
                            "_token": "{{ csrf_token() }}",
                            },
                            success: function(data){
                                button.parents("tr").remove();
                            }
                        });
                });

                $("#posts").on('click', 'tr .data', function(){
                    let id = $(this).siblings(".data_id").text();
                    window.location = "/dashboard/posts/" + id + "/show";
                });


    </script>
@endsection