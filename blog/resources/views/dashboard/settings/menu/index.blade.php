@extends('dashboard.layouts.app')

@section('content')
    <table id="menus" class="table" >
 
        <thead>
            <tr>

              
                <th>#</th>
                <th>title</th>
                <th>Edit</th>
                <th>delete</th>
                
                
            </tr>
        </thead>
        
        <tbody></tbody>
    </table>   

    <div class="row">
            <div style='position: absolute; center: 0;  padding: 0 0 0 0;'
             class="col-md-6 col-sm-6"><a href="{{route('dashboard.menus.create')}}"><button class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> Add Menu Page</button></a></div>

    </div>
    <hr>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
           
            var table = $("#menus").DataTable({
             
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
                        url: "{{ route('dashboard.menus.list') }}",
                        type: 'GET',
                        
                    },
                    columns:
                    [
                       
                        {
                            data: "id",
                            "class": "data_id"
                       
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




                $("#menus").on('click', '.js-update', function () {
                    var button = $(this);
            
                    window.location = "/dashboard/menus/" + button.attr("data-id") + "/edit";
                });

                $("#menus").on('click', '.js-delete', function () {
                    var button = $(this);
            
                    $.ajax(
                        {
                            url: "/dashboard/menus/" + button.attr("data-id") + "/delete",
                            method: "DELETE",
                            data:{
                            "_token": "{{ csrf_token() }}",
                            },
                            success: function(data){
                                button.parents("tr").remove();
                            }
                        });
                });

                $("#menus").on('click', 'tr .data', function(){
                    let id = $(this).siblings(".data_id").text();
                    window.location = "/dashboard/menus/" + id + "/show";
                });


    </script>
@endsection