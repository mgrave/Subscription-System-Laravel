@extends('layouts.backend')
@section('Title', 'create-user')
@section('contetn_header', 'CREATE USERS')

@section('content')
    <div class="row" style="display: flex; justify-content: center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name Here ..">
                            <div class="form-text text-white">Only Tweenty Characters Support.</div>

                            @error('name')
                                <p class="text-danger text-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Here ..">
                            <div class="form-text text-white">Only Fifty Characters Support.</div>

                            @error('email')
                                <p class="text-danger text-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Here ..">
                            <div class="form-text text-white">Only Fourteen Characters Support.</div>

                            @error('phone')
                                <p class="text-danger text-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" placeholder="Facebook Here ..">
                            <div class="form-text text-white">Use Only Facebook Id Number</div>

                            @error('facebook')
                                <p class="text-danger text-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('inc.tostr')
@endsection
