@extends('front.layouts.app')
@section('page-title', $user->name . __(' - Profile'))
@section('page-content')
    <div class="alice-bg padding-top-60 section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="candidate-details">
                        <div class="title-and-info">
                            <div class="title">
                                <div class="thumb">
                                    <img src="{{ $user->image }}" class="img-fluid" alt="">
                                </div>
                                <div class="title-body">
                                    <h4>{{ $user->name }}</h4>
                                    <h6>{{ '@'.$user->username }}</h6>
                                </div>
                            </div>
                            @if(auth()->check() && request()->user()->id !== $user->id)
                                <div class="download-resume">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#create-modal"><i class="fa fa-calendar"></i> {{ __('Request Meeting') }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="details-information section-padding-60">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="about-details details-section">
                                        <h4><i data-feather="align-left"></i>{{ __('About') }}</h4>
                                        <p>
                                            {{ nl2br($user->description) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-7 col-lg-8">
                                <div class="personal-information details-section">
                                    <h4><i data-feather="user-plus"></i>{{ __('Personal Details') }}</h4>
                                    <ul>
                                        <li><span>{{ __('Full Name:') }}</span> {{ $user->name }}</li>
                                        <li><span>{{ __('Username:') }}</span> {{ $user->username }}</li>
                                        <li><span>{{ __('Email:') }}</span> {{ $user->email }}</li>
                                        <li><span>{{ __('Phone number:') }}</span> {{ $user->phone }}</li>
                                        <li><span>{{ __('Address:') }}</span> {{ $user->address }}</li>
                                        <li><span>{{ __('Date of Birth:') }}</span> {{ $user->date_of_birth }}</li>
                                        <li><span>{{ __('Sex:') }}</span> {{ $user->sex }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="account-entry">
        <div class="modal fade show" id="create-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Request Meeting') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0);" id="create-event-form">
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('Title') }}" name="title" id="title" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('Start') }}" name="start" id="start" class="form-control datetime">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('End') }}" name="end" id="end" class="form-control datetime">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="{{ __('Note') }}" name="note" id="note" class="form-control"></textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <button class="button primary-bg btn-block">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function () {
            $(".datetime").flatpickr({
                static: true,
                enableTime: true,
                dateFormat: "Y-m-d H:i:ss",
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#create-event-form').submit(function (event) {
                event.preventDefault();

                let title = $('#title').val(),
                    note = $('#note').val(),
                    start = $('#start').val(),
                    end = $('#end').val();

                $.ajax({
                    url: "{{ route('front.agenda.request', $user->id) }}",
                    data: {title: title, note: note, start: start, end: end},
                    type: "POST",
                    beforeSend: function() {
                        $('#create-event-form').find('span strong').html('');
                        $('#create-event-form').find('.is-ivalid').removeClass('is-ivalid');
                    },
                    success: function (data) {
                        window.location.href = "{{ route('front.agenda.index') }}";
                    },
                    error: function (data) {
                        let errors = data.responseJSON;
                        if(errors.title !== undefined && errors.title !== null){
                            $('#title').addClass('is-invalid');
                            $('#title').parent().find('span strong').text(errors.title[0]);
                        }

                        if(errors.start !== undefined && errors.start !== null){
                            $('#start').parent().parent().addClass('is-invalid');
                            $('#start').parent().parent().find('span strong').text(errors.start[0]);
                        }

                        if(errors.end !== undefined && errors.end !== null){
                            $('#end').parent().parent().addClass('is-invalid');
                            $('#end').parent().parent().find('span strong').text(errors.end[0]);
                        }

                        if(errors.note !== undefined && errors.note !== null){
                            $('#note').addClass('is-invalid');
                            $('#note').parent().find('span strong').text(errors.note[0]);
                        }
                    },
                });
            });
        });
    </script>
@endsection
