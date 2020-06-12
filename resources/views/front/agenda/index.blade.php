@extends('front.layouts.app')
@section('page-title', __('Agenda'))
@section('page-content')
    <div class="alice-bg padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-area">
                        <h1>{{ __('Agenda') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front.home') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('front.home') }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Agenda') }}</li>
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
                            <div class="response"></div>
                            <button type="button" class="button primary-bg" data-toggle="modal" data-target="#create-modal" style="color: #fff;">
                                {{ __('Add Event') }}
                            </button>
                            <div id="calendar"></div>
                        </div>
                        @include('front.partials.profile-sidebar')
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
                        <h5 class="modal-title">{{ __('Add Event') }}</h5>
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
        <div class="modal fade show" id="update-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Event') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><i class="fa fa-user"></i> {{ __('Created by:') }} <strong><span id="event_created_by_user"></span></strong></p>
                        <p><i class="fa fa-user"></i> {{ __('For:') }} <strong><span id="event_for_user"></span></strong></p>
                        <p><i class="fa fa-clock"></i> {{ __('Status:') }} <strong><span id="event_status"></span></strong></p>
                        <form action="#" id="update-event-form">
                            <input type="hidden" id="updated_id">
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('Title') }}" name="title" id="updated_title" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('Start') }}" name="start" id="updated_start" class="form-control datetime">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('End') }}" name="end" id="updated_end" class="form-control datetime">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="{{ __('Note') }}" name="note" id="updated_note" class="form-control"></textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <button class="button primary-bg btn-block" id="update-event-btn">{{ __('Save') }}</button>
                        </form>
                        <br>
                        <form method="POST" id="delete_form" accept-charset="UTF-8" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-danger" onClick="return confirm('{{ __('Are you sure you want to delete?') }}')" value="Submit">
                                <i class="fa fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </form>
                        <form method="POST" id="cancel_form" accept-charset="UTF-8" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-danger" onClick="return confirm('{{ __('Are you sure you want to cancel?') }}')" value="Submit">
                                <i class="fa fa-ban"></i> {{ __('Reject') }}
                            </button>
                        </form>
                        <form method="POST" id="confirm_form" accept-charset="UTF-8" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-success" onClick="return confirm('{{ __('Are you sure you want to confirm?') }}')" value="Submit">
                                <i class="fa fa-check"></i> {{ __('Confirm') }}
                            </button>
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

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: "{{ route('front.agenda.data') }}",
                displayEventTime: true,
                eventRender: function (event, element, view) {
                    event.allDay = event.allDay === 'true';
                },
                selectable: true,
                selectHelper: true,
                eventClick: function (event) {
                    prepareEventForEdit(event.id);
                }
            });
            
            $('#create-event-form').submit(function (event) {
                event.preventDefault();
                
                let title = $('#title').val(),
                    note = $('#note').val(),
                    start = $('#start').val(),
                    end = $('#end').val();
                
                $.ajax({
                    url: "{{ route('front.agenda.store') }}",
                    data: {title: title, note: note, start: start, end: end},
                    type: "POST",
                    beforeSend: function() {
                        $('#create-event-form').find('span strong').html('');
                        $('#create-event-form').find('.is-ivalid').removeClass('is-ivalid');
                    },
                    success: function (data) {
                        location.reload();
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

        $('#update-event-form').submit(function (event) {
            event.preventDefault();

            let title = $('#updated_title').val(),
                note = $('#updated_note').val(),
                start = $('#updated_start').val(),
                end = $('#updated_end').val();

            $.ajax({
                url: "{{ url('client-area/agenda/update/') }}" + "/" + $('#updated_id').val(),
                data: {title: title, note: note, start: start, end: end},
                type: "POST",
                beforeSend: function() {
                    $('#update-event-form').find('span strong').html('');
                    $('#update-event-form').find('.is-ivalid').removeClass('is-ivalid');
                },
                success: function (data) {
                    location.reload();
                },
                error: function (data) {
                    let errors = data.responseJSON;
                    if(errors.title !== undefined && errors.title !== null){
                        $('#updated_title').addClass('is-invalid');
                        $('#updated_title').parent().find('span strong').text(errors.title[0]);
                    }

                    if(errors.start !== undefined && errors.start !== null){
                        $('#updated_start').parent().parent().addClass('is-invalid');
                        $('#updated_start').parent().parent().find('span strong').text(errors.start[0]);
                    }

                    if(errors.end !== undefined && errors.end !== null){
                        $('#updated_end').parent().parent().addClass('is-invalid');
                        $('#updated_end').parent().parent().find('span strong').text(errors.end[0]);
                    }

                    if(errors.note !== undefined && errors.note !== null){
                        $('#updated_note').addClass('is-invalid');
                        $('#updated_note').parent().find('span strong').text(errors.note[0]);
                    }
                },
            });
        });
        
        function prepareEventForEdit(eventId)
        {
            $.ajax({
                type: "GET",
                url: "{{ url('client-area/agenda/get') }}" + "/" + eventId,
                success: function (response) {
                    
                    if(response !== null){

                        $('#update-event-form').find('span strong').html('');
                        $('#update-event-form').find('.is-ivalid').removeClass('is-ivalid');
                        
                        $('#updated_id').val(response.id);
                        $('#updated_title').val(response.title);
                        $('#updated_start').val(response.start);
                        $('#updated_end').val(response.end);
                        $('#updated_note').val(response.note);

                        $('#event_created_by_user').text(response.created_by.name);
                        $('#event_for_user').text(response.owner.name);
                        $('#event_status').text(response.status);

                        $('#update-event-btn').css('display', 'none');
                        $('#cancel_form').css('display', 'none');
                        $('#confirm_form').css('display', 'none');
                        $('#cancel_form').attr('action', '');
                        $('#confirm_form').attr('action', '');
                        $('#delete_form').css('display', 'none');
                        $('#delete_form').attr('action', '');
                        
                        if(response.owner_id === response.created_by_id){

                            $('#update-event-btn').show();
                            $('#delete_form').css('display', 'inline');
                            $('#delete_form').attr('action', '{{ url('client-area/agenda/delete') }}' + '/' + response.id);
                            
                            if(response.status === 'Pending'){
                                $('#cancel_form').css('display', 'inline');
                                $('#confirm_form').css('display', 'inline');
                                $('#cancel_form').attr('action', '{{ url('client-area/agenda/cancel') }}' + '/' + response.id);
                                $('#confirm_form').attr('action', '{{ url('client-area/agenda/confirm') }}' + '/' + response.id);
                            }
                        }

                        $('#update-modal').modal('show');
                    }
                }
            });
        }
    </script>
@endsection
