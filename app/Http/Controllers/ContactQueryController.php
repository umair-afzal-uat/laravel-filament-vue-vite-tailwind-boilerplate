<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactQueryController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Store query in DB
        ContactQuery::create($request->only(['name', 'email', 'message']));

        return response()->json(['message' => 'Your query has been submitted successfully.'], 201);
    }
}
