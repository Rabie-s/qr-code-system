<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QrCodeStoreRequest;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qrCodes = QrCode::with('user:id,name')
            ->select('id', 'name', 'user_id', 'created_at')->latest()->paginate(10);
        return Inertia::render('QrCode/Index', ['qrCodes' => $qrCodes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('QrCode/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QrCodeStoreRequest $request)
    {
        $authenticatedUser = auth()->user();
        $validatedData = $request->validated();
        $qrImage = $request->file('image_path')->store('QrCodeImages', 'public');
        $qrImageName = basename($qrImage);
        $validatedData['image_path'] = $qrImageName;//edit validated avatar 
        $authenticatedUser->qrCodes()->create($validatedData);
        return redirect()->back()->with('message', 'QR-Code created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $qrCode = QrCode::find($id);
        dd($qrCode);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $qrCode = QrCode::findOrFail($id);
        return Inertia::render('QrCode/Edit',['qrCode'=>$qrCode]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qrCode = QrCode::find($id);
        $qrCode->delete();
    }
}
