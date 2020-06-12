@extends('front.layouts.app')
@section('page-title', __('Members'))
@section('page-content')
    <div class="alice-bg padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-area">
                        <h1>Candidates List</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Candidates List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-form">
                        <form action="{{ route('front.members.index') }}">
                            <input type="text" name="keyword" placeholder="{{ __('Search') }}" value="{{ request()->input('keyword') }}">
                            <button><i data-feather="search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alice-bg section-padding-bottom">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="candidate-container">
                        <div class="filtered-candidate-wrapper" style="width: 100%;">
                            <div class="candidate-view-controller-wrapper">
                                <div class="candidate-view-controller">
                                    <div class="controller list active">
                                        <i data-feather="menu"></i>
                                    </div>
                                    <div class="controller grid">
                                        <i data-feather="grid"></i>
                                    </div>
                                    <div class="candidate-view-filter"></div>
                                </div>
                            </div>
                            <div class="candidate-filter-result">
                                @forelse($users as $member)
                                    <div class="candidate">
                                        <div class="thumb">
                                            <a href="{{ route('front.members.details', $member->username) }}">
                                                <img src="{{ $member->image }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="content">
                                                <h4>
                                                    <a href="{{ route('front.members.details', $member->username) }}">
                                                        {{ $member->name }}
                                                    </a>
                                                </h4>
                                                <div class="info">
                                                    <span class="location"><a href="#"><i data-feather="map-pin"></i>{{ $member->address }}</a></span>
                                                </div>
                                            </div>
                                            <div class="button-area">
                                                <a href="{{ route('front.members.details', $member->username) }}">{{ __('View Profile') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="padding-top-60">
                                {{ $users->appends(request()->except('page'))->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
