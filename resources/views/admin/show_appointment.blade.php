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
                <h4 class="card-title">All Appointment List</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                        <thead>
                            <tr>
                                <th> Patient name </th>
                                <th> Email </th>
                                <th> Phone Number </th>
                                <th> Doctor Name </th>
                                <th> Serial Date </th>
                                <th> Message </th>
                                <th> Status </th>
                                <th> Approved </th>
                                <th> Cancled </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_appointment as $appointments)
                                <tr class="table-dark">
                                    <td> {{ $appointments->name }} </td>
                                    <td> {{ $appointments->email }} </td>
                                    <td> {{ $appointments->phone }} </td>
                                    <td> {{ $appointments->doctor }} </td>
                                    <td> {{ $appointments->date }} </td>
                                    <td> {{ $appointments->message }} </td>
                                    <td> {{ $appointments->status }} </td>
                                    <td><a href="{{ route('approve-appointment', $appointments->id) }}"
                                            class="btn btn-success">Approved</a></td>
                                    <td><a href="{{ route('cancle-appointment', $appointments->id) }}"
                                            class="btn btn-warning">Cancled</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
