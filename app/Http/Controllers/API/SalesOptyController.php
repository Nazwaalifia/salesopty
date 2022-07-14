<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SalesOpty;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class SalesOptyController extends Controller
{
    public function index(Request $request)
    {
        $data = SalesOpty::orderBy("created_at" , "DESC")->paginate(10);

        return response()->json([
            "status" => "true",
            "data" => $data
        ]);

    }

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

            return response()->json([
                "status" => true,
                "message" => "berhasil dibuat"
            ]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function edit(Request $request,$id)
    {
        $salesopty = new SalesOpty();
        $getOneById = SalesOpty::find($id);

        return response()->json(["status" => true, "data" => $getOneById]);

    }

}
