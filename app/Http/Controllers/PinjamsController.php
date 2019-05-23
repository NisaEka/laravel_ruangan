<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PinjamService;
use App\Http\Requests\PinjamCreateRequest;
use App\Http\Requests\PinjamUpdateRequest;

class PinjamsController extends Controller
{
    public function __construct(PinjamService $pinjam_service)
    {
        $this->service = $pinjam_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pinjams = $this->service->paginated();
        return view('pinjams.index')->with('pinjams', $pinjams);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $pinjams = $this->service->search($request->search);
        return view('pinjams.index')->with('pinjams', $pinjams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pinjams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PinjamCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PinjamCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('pinjams.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('pinjams.index'))->withErrors('Failed to create');
    }

    /**
     * Display the pinjam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pinjam = $this->service->find($id);
        return view('pinjams.show')->with('pinjam', $pinjam);
    }

    /**
     * Show the form for editing the pinjam.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjam = $this->service->find($id);
        return view('pinjams.edit')->with('pinjam', $pinjam);
    }

    /**
     * Update the pinjams in storage.
     *
     * @param  App\Http\Requests\PinjamUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PinjamUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->withErrors('Failed to update');
    }

    /**
     * Remove the pinjams from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('pinjams.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('pinjams.index'))->withErrors('Failed to delete');
    }
}
