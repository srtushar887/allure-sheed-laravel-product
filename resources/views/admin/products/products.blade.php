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
                <h4 class="page-title">Product</h4>
            </div>
        </div>
    </div>

    @include('layouts.error')
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#importProductCsv">Import Product CSV</button>

    <a href="{{route('admin.product.export')}}">

        <button class="btn btn-success btn-sm">Export Product CSV</button>
    </a>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#delete">Delete Product</button>
    <a href="{{route('admin.product.create')}}">

        <button class="btn btn-success btn-sm">Create Product</button>
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Product List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="product">
                        <thead>
                        <tr>
                            <th>Schedule Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>


    </div>


    <div class="modal fade" id="importProductCsv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('import.csv')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Import csv file</label>
                        <input type="file" class="form-control" name="csv_file">
                    </div>
                    <div class="form-group">
                        <label>Action</label>
                        <select class="form-control" name="action">
                            <option value="0">select any</option>
                            <option value="1">Import</option>
                            <option value="3">Update</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete.prodict')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete data ?
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



    <div class="modal fade" id="deletesinglepro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('delete.product.single')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this product ?
                            <input type="hidden" name="single_product_delte_id" class="singleprodelid">
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

        function deleteproductsingle(id) {
            $('.singleprodelid').val(id);
        }

        $(document).ready(function () {



            $('#product').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.products') }}",
                columns: [
                    { data: 'schedule_name', name: 'schedule_name',class : 'text-center' },
                    { data: 'product_name', name: 'product_name',class : 'text-center' },
                    { data: 'product_image', name: 'product_image',class : 'text-center' },
                    { data: 'category', name: 'category',class : 'text-center' },
                    { data: 'tags', name: 'tags',class : 'text-center' },
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

