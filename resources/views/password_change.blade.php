@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Password Change Page') }}</div>

                    <div class="card-body">

                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @elseif (session()->has('error'))
                            <strong class="text-danger">{{ session()->get('error') }}</strong>
                        @endif

                        <br>

                        <form method="post" action="{{ route('password.updated') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input name="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    id="current_password" placeholder="Current Password">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input name="newPassword" type="password"
                                    class="form-control @error('newPassword') is-invalid @enderror" id="newPassword"
                                    placeholder="New Password">
                                @error('newPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="newPassword_confirmation" class="form-label">Confirm New Password</label>
                                <input name="newPassword_confirmation" type="password" class="form-control"
                                    id="newPassword_confirmation" placeholder="Confirm New Password">
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-success">Change Password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
