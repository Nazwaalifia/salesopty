<?php

namespace App\Http\Controllers;

use App\Models\SalesOpty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = SalesOpty::all();
        return view('salesopty.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesopty.inputsales');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                "NamaClient" => "required|string",
                "NamaProject" => "required|string",
                "Timeline" => "required|string",
                "Date" => "required|string",
                "Angka" => "required|integer",
                "Status" => "required|string",
                "Note" => "required|string"
            ]);
            
            if ($validate->fails()) {
                return response()->json($validate->errors());
            }

            SalesOpty::create([
                "NamaClient" => $request->NamaClient,
                "NamaProject" => $request->NamaProject,
                "Timeline" => $request->Timeline,
                "Date" => $request->Date,
                "Angka" => $request->Angka,
                "Status" => $request->Status,
                "Note" => $request->Note
            ]);

            return redirect('index-sales');

        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function filter(Request $request)
    {
        try {
            if ($request->timeline == 'Q1') {
                $sales =  SalesOpty::whereBetween('date', [Carbon::now()->month(01)->startOfMonth(), Carbon::now()->month(03)->endOfMonth()])->orderBy('created_at', 'desc')->paginate(10);
            } elseif ($request->timeline == 'Q2') {
                $sales =  SalesOpty::whereBetween('date', [Carbon::now()->month(04)->startOfMonth(), Carbon::now()->month(06)->endOfMonth()])->orderBy('created_at', 'desc')->paginate(10);
            } elseif ($request->timeline == 'Q3') {
                $sales =  SalesOpty::whereBetween('date', [Carbon::now()->month(07)->startOfMonth(), Carbon::now()->month('09')->endOfMonth()])->orderBy('created_at', 'desc')->paginate(10);
            } elseif ($request->timeline == 'Q4') {
                $sales =  SalesOpty::whereBetween('date', [Carbon::now()->month(10)->startOfMonth(), Carbon::now()->month(12)->endOfMonth()])->orderBy('created_at', 'desc')->paginate(10);
            } else {
                $sales =  SalesOpty::orderBy('created_at', 'desc')->paginate(10);
            }

            return view('salesopty.index', compact('sales'));
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => "Gagal"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
