@extends('backend.layout.index', ['active' => 'detail_checkout'])
@section('title', 'Checkout')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Order</h1>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <th>Barang</th>
                        <th>: {{$checkout->product->name}}</th>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>: {{$checkout->entry_date}}</th>
                    </tr>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>: {{$checkout->user->name}}</th>
                    </tr>
                    <tr>
                        <th>Nama Penerima</th>
                        <th>: {{$checkout->receiver_id}}</th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>: {{$checkout->address}}</th>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <th>: {{$checkout->phone_number}}</th>
                    </tr>
                    <tr>
                        <th>Total Tagihan</th>
                        <th>: {{$checkout->Total_amount}}</th>
                    </tr>
                    <tr>
                        <th>Payment</th>
                        <th>: {{$checkout->payment->name}}</th>
                    </tr>
                    <tr>
                        <th>Tanggal payment</th>
                        <th>: {{$checkout->payment_date}}</th>
                    </tr>
                    <tr>
                        <th>Courier</th>
                        <th>: {{$checkout->courier}}</th>
                    </tr>
                    <tr>
                        <th>Harga Courier</th>
                        <th>: {{$checkout->courier_price}}</th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>: {{$checkout->status}}</th>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection