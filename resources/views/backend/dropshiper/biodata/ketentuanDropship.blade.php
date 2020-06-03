@extends('backend.layouts.index', ['active' => 'detail_checkout'])
@section('title', 'Checkout')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ketentuan Dropshiper</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dropshiper</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Ketentuan Dropshiper</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection