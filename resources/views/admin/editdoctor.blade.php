@extends('admin.layouts.template')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body mx-4">
                <h4 class="card-title">Edit Doctor Info</h4>
                <p class="card-description"> Input informatiom </p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form class="forms-sample" action="{{ route('updatedoctor') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $doctor_info->id }}" name="id">
                    <div class="form-group">
                        <label for="name">Doctor Name</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="name"
                            name="name" value="{{ $doctor_info->name }}" placeholder="Enter Doctor Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input style="background-color: #b2b5b5" type="number" class="form-control" id="phone"
                            name="phone" value="{{ $doctor_info->phone }}" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select style="background-color: #b2b5b5" class="form-control" id="speciality" name="Speciality">
                            <option>{{ $doctor_info->Speciality }}</option>
                            <option value="Medicine Specialist">Medicine Specialist</option>
                            <option value="Heart Specialist">Heart Specialist</option>
                            <option value="Eye Specialist">Eye Specialist</option>
                            <option value="Nuro Specialist">Nuro Specialist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Room Number</label>
                        <input style="background-color: #b2b5b5" type="number" class="form-control" id="room_no"
                            name="room_no" value="{{ $doctor_info->room_no }}" placeholder="Enter Room Number">
                    </div>
                    <div class="form-group">
                        <label for="formFile">Old Image</label>
                        <img style="height: 50px" src="{{ asset('upload/' . $doctor_info->image) }}" alt="">
                    </div>
                    <div class="form-group">
                        <label for="formFile">New Image</label>
                        <input style="background-color: #b2b5b5" class="form-control" type="file" id="image"
                            name="image" />
                    </div>
                    <div class="form-group">
                        <label for="details">Doctor Details</label>
                        <textarea style="background-color: #b2b5b5" class="form-control" id="details" name="details"
                            value="{{ $doctor_info->details }}" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
