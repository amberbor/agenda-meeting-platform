@extends('back.layouts.app')
@section('page-title', __('Users'))
@section('page-content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Users') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Full Name') }}</th>
                            <th>{{ __('Username') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone number') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Date of Birth') }}</th>
                            <th>{{ __('Sex') }}</th>
                            <th>{{ __('Email Verified At') }}</th>
                            <th>{{ __('Banned At') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ __('Full Name') }}</th>
                            <th>{{ __('Username') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone number') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Date of Birth') }}</th>
                            <th>{{ __('Sex') }}</th>
                            <th>{{ __('Email Verified At') }}</th>
                            <th>{{ __('Banned At') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('back.users.index') }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'date_of_birth', name: 'date_of_birth'},
                {data: 'sex', name: 'sex'},
                {data: 'email_verified_at', name: 'email_verified_at'},
                {data: 'banned_at', name: 'banned_at'},
                {
                    data: 'role.name',
                    name: 'role.name',
                    render: function (data, type, full, meta) {
                        if(full.role !== null){
                            return full.role.name;
                        }
                        return '';
                    }
                },
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
