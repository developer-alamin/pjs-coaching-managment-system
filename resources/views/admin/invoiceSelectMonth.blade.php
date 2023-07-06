@extends('backend.app')
@section('title','Admin || View Invoice')
@section('content')
<style>
    thead {
        background: #00ff07;
        font-size: 23px;
        text-align: center;
        color: white;
        font-family: initial;
    }

    tbody {
        text-align: center;
        font-weight: bolder;
    }
    td {
        font-weight: bold;
        color: #6fff00;
    }

</style>
<br>
    <div class="card">
        <div class="card-header">
            <h1>View Invoice Date</h1>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Invoice Month</th>
                        <th>Due</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ( $invoiceData as $key => $value)
                @php
                    $curentData = date('M-Y');
                    if ($value->invoice_month == $curentData){
                        continue;
                    }
                @endphp
                <tbody>
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{ $value->invoice_month; }}</td>
                        <td>1</td>
                        <td><a href="{{ route('invoice.viewInoiceData',[$value->invoice_month]) }}"><i class="material-icons-outlined visible">visibility</i></a></td>
                    </tr>
                </tbody>
                @endforeach 
            </table>
        </div>
    </div>
@endsection