<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = Social::all();
        return view('admin.socials.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $social = new Social();
        return view('admin.socials.create', compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $social = Social::create($data);
        return redirect()->route('admin.socials.show', $social);
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        return view('admin.socials.show', compact('social'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        $data = $request->all();
        $social -> update($data);
        return redirect(route('admin.socials.show', $social));
    }

    /**
     * Remove the specified r                  esource from storage.
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('admin.socials.index');
    }
}
