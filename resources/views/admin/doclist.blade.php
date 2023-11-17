@extends('admin.layouts.template')
@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                @if (Session::get('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <h4 class="card-title">All Doctor List</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                        <thead>
                            <tr>
                                <th> Doctor name </th>
                                <th> Speciality </th>
                                <th> Phone Number </th>
                                <th> Room No </th>
                                <th> Image </th>
                                <th> Action </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctor_info as $doctors)
                                <tr class="table-dark">
                                    <td> {{ $doctors->name }} </td>
                                    <td> {{ $doctors->Speciality }} </td>
                                    <td> {{ $doctors->phone }} </td>
                                    <td> {{ $doctors->room_no }} </td>
                                    <td> <img style="height: 50px,wdith:50px" src="{{ asset('upload/' . $doctors->image) }}"
                                            alt=""> </td>
                                    <td><a href="{{ route('editdoctor', $doctors->id) }}" class="btn btn-info">Edit</a></td>
                                    <td><a href="{{ route('deletedoctor', $doctors->id) }}" class="btn btn-warning"
                                            onclick="return confirm('Are you sure to delete this?')">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
