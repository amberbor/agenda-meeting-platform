@extends('front.layouts.app')
@section('page-title', __('Edit Profile'))
@section('page-content')
    <div class="alice-bg padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-area">
                        <h1>{{ __('Edit Profile') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front.home') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front.home') }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Profile') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row no-gliters">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">
                            <form action="{{ route('front.profile.update') }}" method="POST" class="dashboard-form">
                                @csrf
                                <div class="dashboard-section upload-profile-photo">
                                    <div class="update-photo">
                                        <img class="image" src="{{ request()->user()->image }}" alt="">
                                    </div>
                                </div>
                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="user-check"></i>{{ __('Basic Info') }}</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="name">{{ __('Full Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="{{ __('Full Name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="username">{{ __('Username') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username', $user->username) }}" placeholder="{{ __('Username') }}">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="date_of_birth">{{ __('Date of Birth') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control date @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" placeholder="{{ __('Date of Birth') }}">
                                            @error('date_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="sex">{{ __('Sex') }}</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('sex') is-invalid @enderror" name="sex" id="sex">
                                                <option>Choose</option>
                                                <option value="Male" {{ (old('sex', $user->sex) == 'Male') ? 'selected="selected"' : '' }}>Male</option>
                                                <option value="Female" {{ (old('sex', $user->sex) == 'Female') ? 'selected="selected"' : '' }}>Female</option>
                                            </select>
                                            @error('sex')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="email">{{ __('Email Address') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="{{ __('Email Address') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="phone">{{ __('Phone') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" placeholder="{{ __('Phone') }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="address">{{ __('Address') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address @error('address') is-invalid @enderror" id="address" value="{{ old('address', $user->address) }}" placeholder="{{ __('Address') }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="description">{{ __('About Me') }}</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="{{ __('About Me') }}">{{ old('description', $user->description) }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="private">{{ __('Private Profile') }}</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('private') is-invalid @enderror" name="private" id="private">
                                                <option value="0" {{ (old('private', $user->private) == 0) ? 'selected="selected"' : '' }}>No</option>
                                                <option value="1" {{ (old('private', $user->private) == 1) ? 'selected="selected"' : '' }}>Yes</option>
                                            </select>
                                            @error('private')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="lock"></i>{{ __('Confirm Password') }}</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="current_password">{{ __('Confirm Password') }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" placeholder="{{ __('Current Password') }}">
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="lock"></i>{{ __('Change Password') }}</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="password">{{ __('New Password') }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="{{ __('New Password') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="confirm_password">{{ __('Retype Password') }}</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="{{ __('Retype Password') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button class="button">{{ __('Save Profile Chages') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('front.partials.profile-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function () {
            $(".date").flatpickr({
                dateFormat: "d/m/Y",
            });
        });
    </script>
@endsection
