@extends('layouts.master')

@section('title', 'Transaction History — Le Petite Pasta')

@section('styles')
    <style>
        * {
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        table {
            background: #fff;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .btn1 {
            background-color: #000000;
            color: #ffffff;
            border-radius: 10px;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            transition: all 0.4s ease;
            cursor: pointer;
            color: #fff;
            font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        }

        .btn1:hover {
            color: #ffffff;
        }

        thead {
            background-color: #000000;
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
@if(auth()->user()->role=="member")
<div class="container my-5">
    @if($transactions->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Transaction Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        <a href="/transactions/{{ $transaction->id }}" class="btn btn1">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @for ($i = 0; $i < 20; $i++)
            <br>
        @endfor
      @else
        <div class="d-flex justify-content-center my-5">
            <p class="h4 text-muted">No transaction</p>
        </div>
        @for ($i = 0; $i < 20; $i++)
            <br>
        @endfor
      @endif
</div>

@elseif(auth()->user()->role=="admin")
<div class="container my-5">
    @if($alltransactions->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Transaction Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($alltransactions as $trans)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $trans->created_at }}</td>
                    <td>
                        <a href="/transactions/{{ $trans->id }}" class="btn btn1">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      @else
        <div class="d-flex justify-content-center my-5">
            <p class="h4 text-muted">No transaction</p>
        </div>
        @for ($i = 0; $i < 30; $i++)
            <br>
        @endfor
      @endif
</div>
@endif

@for ($i = 0; $i < 20; $i++)
    <br>
@endfor
@endsection