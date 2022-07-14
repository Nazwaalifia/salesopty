@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Sales</h1>
        </div>
       <div class="card">
        <div class="card-body">
        <form action="{{route('simpan-data')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
        
                <div class="mb-3 row">
                    <label for="inputNamaClient" class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Nama Client</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="NamaClient" placeholder="Nama Client" id="inputNamaClient">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="inputNamaProject" class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Nama Project</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="NamaProject" placeholder="Nama Project" id="inputNamaProject">
                    </div>
                </div>
        
                <div class="mb-2 row">
                    <label for="inputTimeline" class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Timeline</label>
                    <div class="col-sm-10">
                    <select name="Timeline" class="form-control">
                        <option value="">-- Timeline Dropdown Q1, Q2, Q3, Q4 --</option>
                        <option value="Q1"> Q1</option>
                        <option value="Q2"> Q2</option>
                        <option value="Q3"> Q3</option>
                        <option value="Q4"> Q4</option>
                    </select>
                    </div>
                </div>
        

                <div class="mb-2 row">
                    <label class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Date</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control date" name="Date">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="inputAngka" class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Angka</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" name="Angka" placeholder="Angka" id="inputAngka">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="inputStatus" class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Status</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="Status">
                        <option value="">-- Tender, Menang, Kalah --</option>
                        <option value="Tender"> Tender</option>
                        <option value="Menang"> Menang</option>
                        <option value="Kalah"> Kalah</option>
                    </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label" style="color:black;font-weight:bold">Note</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" name="Note" id="exampleFormControlTextarea1" ></textarea>
                    </div>
                </div>
                <div style="text-align:right;">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <button type="submit" class="btn btn-danger btn-sm">Back</button>
                </div>
        </form>
        </div>
       </div>

      
    
    </section>
@endsection