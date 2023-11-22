@extends('admin.layouts.template')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body mx-4">
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
                <h4 class="card-title">Send Patient Comformation Mail</h4>
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
                <form class="forms-sample" action="{{ route('submitmail', $appointment_info->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Greeting</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="greeting"
                            name="greeting">
                    </div>
                    <div class="form-group">
                        <label for="details">Mail Body</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="body"
                            name="body">
                    </div>
                    <div class="form-group">
                        <label for="phone">Action Text</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="action_text"
                            name="action_text">
                    </div>

                    <div class="form-group">
                        <label for="room">Action Url</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="action_url"
                            name="action_url">
                    </div>
                    <div class="form-group">
                        <label for="room">End Part</label>
                        <input style="background-color: #b2b5b5" type="text" class="form-control" id="end_part"
                            name="end_part">
                    </div>


                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
