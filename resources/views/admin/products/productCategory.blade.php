@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Product Category</h4>
            </div>
        </div>
    </div>

    @include('layouts.error')
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createCategory">Create Category</button>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Product List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="product">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>


    </div>


    <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="hidden" class="form-control cateditid" name="category_edit_id">
                            <input type="text" class="form-control catname" name="category_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deletecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this category ?
                            <input type="hidden" class="form-control catdeleteid" name="category_delete_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>

        function deletesingcat(id) {
            $('.catdeleteid').val(id);
        }



        function editsinglecat(id)
        {
            var id = id;
            console.log(id);
            $.ajax({
                type : "POST",
                url : "{{route('get.single.category')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'id' : id,
                },
                success:function (data) {
                    $('.cateditid').val(id);
                    $('.catname').val(data.category_name);
                }
            });
        };

        $(document).ready(function () {



            $('#product').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.category') }}",
                columns: [
                    { data: 'category_name', name: 'category_name',class : 'text-center' },
                    {data: 'action', name: 'action', orderable: false, searchable: false,class : 'text-center'},
                ]
            });


        });
    </script>
    <script>
        @if (count($errors) > 0)

        $('#exampleModalCenter').modal('show');
        @endif
    </script>
@endsection

