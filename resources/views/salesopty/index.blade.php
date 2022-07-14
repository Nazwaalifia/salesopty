@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Index Sales</h1>
        </div>
       <div class="card">
        <div class="card-body">
        <table class="table table-striped table-hover">
            <a href="{{route('inputsales')}}"><button type="submit" class="btn btn-primary btn-sm">Create</button></a>
         <hr>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Projek</th>
                <th colspan="4">Timeline</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Catatan</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Q1</th>
                <th>Q2</th>
                <th>Q3</th>
                <th>Q4</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
         </thead>
         
         <tbody>
            @foreach ($sales as $opty)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $opty->NamaClient }}</td>
                    <td>{{ $opty->NamaProject }}</td>
                    <td>
                        @if ($opty->Timeline == 'Q1')
                            {{ number_format($opty->Angka,0,',','.') }}
                        @endif
                    </td>
                    <td>
                        @if ($opty->Timeline == 'Q2')
                            {{ number_format($opty->Angka,0,',','.') }}
                        @endif
                    </td>
                    <td>
                        @if ($opty->Timeline == 'Q3')
                            {{ number_format($opty->Angka,0,',','.') }}
                        @endif
                    </td>
                    <td>
                        @if ($opty->Timeline == 'Q4')
                            {{ number_format($opty->Angka,0,',','.') }}
                        @endif
                    </td>
                    <td>{{ $opty->Date }}</td>
                    <td>
                        @if ($opty->Status == 'Menang')
                            <span class="badge badge-success">{{ $opty->Status }}</span>
                        @elseif ($opty->Status == 'Kalah')
                            <span class="badge badge-danger">{{ $opty->Status }}</span>
                        @elseif ($opty->Status == 'Tender')
                            <span class="badge badge-warning">{{ $opty->Status }}</span>
                        @endif
                    </td>
                    <td>{{ $opty->Note }}</td>
                </tr>
            @endforeach
         </tbody>
        </table>
        </div>
       </div>
    
    </section>
@endsection