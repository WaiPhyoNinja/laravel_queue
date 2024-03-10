@extends('layouts.dashborad')
@section('content')
    <div class="hero">
        <div class="container mt-4">
            <a href="{{ route('create.time') }}" class="btn btn-primary">Create time</a>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-start">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Send Mail</div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('send.mail') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Recipient Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
@endsection
