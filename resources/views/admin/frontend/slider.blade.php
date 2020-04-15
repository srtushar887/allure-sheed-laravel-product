@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Home Slider</h4>
            </div>
        </div>
    </div>

    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Create New</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Sub-Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slider as $slid)
                        <tr>
                            <th scope="row"><img src="{{asset($slid->image)}}" style="height: 100px;width: 100px;"></th>
                            <th scope="row">{{$slid->title}}</th>
                            <th scope="row">{{$slid->sib_title}}</th>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editslider{{$slid->id}}"><i class="fas fa-edit"></i> </button>
{{--                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteslider{{$slid->id}}"><i class="fas fa-trash"></i> </button>--}}
                            </td>
                        </tr>







                        <div class="modal fade" id="editslider{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('slider.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <br>
                                                <img src="{{asset($slid->image)}}" style="height: 100px;width: 100px;">
                                                <input type="file" name="image" class="form-control">
                                                <input type="hidden" name="slider_edit_id" value="{{$slid->id}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{$slid->title}}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Sub-Title</label>
                                                <input type="text" name="sib_title" value="{{$slid->sib_title}}" class="form-control">
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

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('slider.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sub-Title</label>
                        <input type="text" name="sib_title" class="form-control">
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
@stop
