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
                <th>Nama</th>
                <th>Contoh</th>
            </tr>
         </thead>
         
         <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
         </tbody>
</table>
        </div>
       </div>

      
    
    </section>
@endsection