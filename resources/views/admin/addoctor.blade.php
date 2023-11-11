@extends('admin.layouts.template')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body mx-4">
                <h4 class="card-title">Add New Doctor</h4>
                <p class="card-description"> Input informatiom </p>
                <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Doctor Name</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="name"
                            name="name" placeholder="Enter Doctor Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input style="background-color: #b2b5b5" type="number" class="form-control" id="phone"
                            name="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select style="background-color: #b2b5b5" class="form-control" id="speciality" name="speciality">
                            <option value="Medicine Specialist">Medicine Specialist</option>
                            <option value="Heart Specialist">Heart Specialist</option>
                            <option value="Eye Specialist">Eye Specialist</option>
                            <option value="Nuro Specialist">Nuro Specialist</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Room Number</label>
                        <input style="background-color: #b2b5b5" type="number" class="form-control" id="room"
                            name="room" placeholder="Enter Room Number">
                    </div>
                    <div class="form-group">
                        <label for="formFile">Doctor Image</label>
                        <input style="background-color: #b2b5b5" class="form-control" type="file" id="image"
                            name="image" />
                    </div>
                    <div class="form-group">
                        <label for="details">Doctor Details</label>
                        <textarea style="background-color: #b2b5b5" class="form-control" id="details" name="details" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
