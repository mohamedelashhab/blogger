@extends('dashboard.layouts.app')

@section('content')
    <table id="users" class="table" >
 
        <thead>
            <tr>

              
                <th>#</th>
                <th>name</th>
                <th>email</th>
                <th>Edit</th>
                <th>delete</th>
                
                
            </tr>
        </thead>
        
        <tbody></tbody>
    </table>   

    <div class="row">
            <div style='position: absolute; center: 0;  padding: 0 0 0 0;'
             class="col-md-6 col-sm-6"><a href="{{route('dashboard.users.create')}}"><button class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> Add New User</button></a></div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
           
            var table = $("#users").DataTable({
             
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
                        url: "{{ route('dashboard.users.list') }}",
                        type: 'GET',
                        
                    },
                    columns:
                    [
                       
                        {
                            data: "id",
                            "class": "data_id"
                       
                        },
                        
                        {
                            data: "name",
                            "class": "data"
                        
                        },
                        {
                            data: "email",
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




                $("#users").on('click', '.js-update', function () {
                    var button = $(this);
            
                    window.location = "/dashboard/users/" + button.attr("data-id") + "/edit";
                });

                $("#users").on('click', '.js-delete', function () {
                    var button = $(this);
            
                    $.ajax(
                        {
                            url: "/dashboard/users/" + button.attr("data-id") + "/delete",
                            method: "DELETE",
                            data:{
                            "_token": "{{ csrf_token() }}",
                            },
                            success: function(data){
                                button.parents("tr").remove();
                            }
                        });
                });

                $("#users").on('click', 'tr .data', function(){
                    let id = $(this).siblings(".data_id").text();
                    window.location = "/dashboard/users/" + id + "/show";
                });


    </script>
@endsection