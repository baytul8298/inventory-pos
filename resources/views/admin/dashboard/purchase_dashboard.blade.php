@extends('admin.layout.master')
@section('title','Purchase Module')
@section('page-title', 'Purchase Module')

@section('content')
@include('admin.dashboard.inc.purchase_sidebar')

<div class="main-content app-content mt-0">
    <div class="side-app">
        <!-- Container Start -->
        <div class="main-container container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title text-center">
                    Purchase Module
                </h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Purchase Module
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Modules Grid -->
            <div class="row g-4 text-center">
                @php
                    $modules = [
                        ['icon' => 'fa fa-shopping-cart', 'label' => 'Purchase Entry', 'url' => '/sales'],
                        ['icon' => 'fa fa-rotate-right', 'label' => 'Purchase Return', 'url' => '/purchase'],
                        ['icon' => 'fa fa-file-text-o', 'label' => 'Purchase Record', 'url' => '/accounts'],
                        ['icon' => 'fa fa-line-chart', 'label' => 'Asset Entry', 'url' => '/hr'],
                        ['icon' => 'fa fa-print', 'label' => 'Purchase Invoice', 'url' => '/reports'],
                        ['icon' => 'fa fa-th-list', 'label' => 'Supplier Due Report', 'url' => '/admin'],
                        ['icon' => 'fa fa-credit-card-alt', 'label' => 'Supplier Payment Report', 'url' => '/monitor'],
                        ['icon' => 'fa fa-list', 'label' => 'Supplier List', 'url' => '/logout'],
                        ['icon' => 'fa fa-list-ul', 'label' => 'Purchase Return List', 'url' => '/logout'],
                        ['icon' => 'fa fa-list-alt', 'label' => 'Purchase Return Details', 'url' => '/logout'],
                        ['icon' => 'fa fa-tasks', 'label' => 'Re-Order List', 'url' => '/logout'],
                    ];
                @endphp

                @foreach($modules as $module)
                    <div class="col-md-2 col-sm-6">
                        <a href="{{ $module['url'] ?? '#' }}" class="text-decoration-none">
                            <div class="module-box d-flex flex-column align-items-center justify-content-center text-white">
                                <i class="bi {{ $module['icon'] }} fs-1 mb-2 fa-2xl"></i>
                                <h5 class="fw-bold mb-0">{{ $module['label'] }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Container End -->
    </div>
</div>
@endsection

@section('style')
<style>
    .page-header .breadcrumb {
        margin-top: 0 !important;
    }
    .module-box {
        height: 110px;
        background: linear-gradient(135deg, #3b3a3a, #01C0C8);
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .module-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    }

    .page-header .breadcrumb {
        background: transparent;
        padding: 0;
        margin-top: 10px;
    }
    </style>
@endsection

@section('script')
@endsection