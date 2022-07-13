<?php

namespace App\Http\Controllers;

use App\Models\SalesOpty;
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
       return view('salesopty.index');
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
