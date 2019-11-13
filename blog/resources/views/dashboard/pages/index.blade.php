@extends('dashboard.layouts.app')

@section('content')
    <table id="pages" class="table" >
 
        <thead>
            <tr>

              
                <th>slug</th>
                <th>title</th>
                <th>Edit</th>
                <th>delete</th>
                
                
            </tr>
        </thead>
        
        <tbody></tbody>
    </table>   

    <div class="row">
            <div style='position: absolute; center: 0;  padding: 0 0 0 0;'
             class="col-md-6 col-sm-6"><a href="{{route('dashboard.pages.create')}}"><button class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> Add New Page</button></a></div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
           
            var table = $("#pages").DataTable({
             
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
                        url: "{{ route('dashboard.pages.list') }}",
                        type: 'GET',
                        
                    },
                    columns:
                    [
                       
                        {
                            data: "slug",
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




                $("#pages").on('click', '.js-update', function () {
                    var button = $(this);
            
                    window.location = "/dashboard/pages/" + button.attr("data-id") + "/edit";
                });

                $("#pages").on('click', '.js-delete', function () {
                    var button = $(this);
            
                    $.ajax(
                        {
                            url: "/dashboard/pages/" + button.attr("data-id") + "/delete",
                            method: "DELETE",
                            data:{
                            "_token": "{{ csrf_token() }}",
                            },
                            success: function(data){
                                button.parents("tr").remove();
                            }
                        });
                });

                $("#pages").on('click', 'tr .data', function(){
                    let id = $(this).siblings(".data_id").text();
                    window.location = "/dashboard/pages/" + id + "/show";
                });


    </script>
@endsection