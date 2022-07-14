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
            <form action="{{ route('salesopty.filter') }}" method="get">
                @csrf
                <select name="timeline" id="" class="form-control">
                    <option value="Q1">Q1</option>
                    <option value="Q2">Q2</option>
                    <option value="Q3">Q3</option>
                    <option value="Q4">Q4</option>
                </select>
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
         <hr>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Nama Projek</th>
                <th>Nama Timeline</th>
                <th>Tanggal</th>
                <th>Angka</th>
                <th>Status</th>
                <th>Catatan</th>
            </tr>
         </thead>
         
         <tbody>
            @foreach ($sales as $opty)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $opty->NamaClient }}</td>
                    <td>{{ $opty->NamaProject }}</td>
                    <td>{{ $opty->Timeline }}</td>
                    <td>{{ \Carbon\Carbon::parse($opty->Date)->format('d M Y') }}</td>
                    <td>{{ $opty->Angka }}</td>
                    <td>
                        @if ($opty->Status == 'Menang')
                            <span class="badge badge-success">{{ $opty->Status }}</span>
                        @elseif ($opty->Status == 'Kalah')
                            <span class="badge badge-danger">{{ $opty->Status }}</span>
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