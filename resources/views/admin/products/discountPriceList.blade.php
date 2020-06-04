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

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Product List</h4>

                <div class="table-responsive">

                    <table class="table mb-0" id="productdis">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Discount</th>
                            <th>action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>


    </div>



    <div class="modal fade" id="disdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.product.discount.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this discount ?
                            <input type="hidden" class="form-control disdeleteid" name="dis_delete_id">
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

        function deletedis(id) {
            $('.disdeleteid').val(id);
        }


        $(document).ready(function () {



            $('#productdis').DataTable({

                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get.category.discount') }}",
                columns: [
                    { data: 'category', name: 'category',class : 'text-center' },
                    { data: 'discount_price', name: 'discount_price',class : 'text-center' },
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

