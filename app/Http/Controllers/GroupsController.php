<?php

namespace App\Http\Controllers;

use App\Groups;
use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::latest()->paginate(5);

        return view('groups.index', compact('groups'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $request->validated(); // here is you magic method

        Groups::create($request->all());

        return redirect()->route('groups.index')
            ->with('success', 'Groups created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(Groups $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, Groups $group)
    {
        $request->validated(); // here is you magic method

        $group->update($request->all());

        return redirect()->route('groups.index')
            ->with('success', 'Groups updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $group)
    {
        $group->delete();

        return redirect()->route('groups.index')
            ->with('success', 'Product deleted successfully');
    }
}
