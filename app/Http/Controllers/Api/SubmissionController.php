<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = Submission::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $submissions,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string',
            ],
            // Customer Error Message (Optional)
            [
                'name.required' => 'Please, Write Down your Name',
                'email.required' => 'Please, Give your Email',
                'message.required' => 'Please, Fill-up the Message',
            ]
        );
        // Cheeking Data Save to Database
        try {
            $submission = Submission::create($validateData);

            return response()->json([
                'success' => true,
                'message' => 'Submission saved successfully',
                'data' => $submission,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not Save',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
