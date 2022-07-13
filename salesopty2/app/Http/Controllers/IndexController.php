<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SalesOpty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $data = SalesOpty::orderBy("created_at", "DESC")->paginate(10);

        return response()->json([
            "status" => true,
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        try {
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
    }

