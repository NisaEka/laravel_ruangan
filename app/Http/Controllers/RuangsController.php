<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\RuangService;
use App\Http\Requests\RuangCreateRequest;
use App\Http\Requests\RuangUpdateRequest;

class RuangsController extends Controller
{
    public function __construct(RuangService $ruang_service)
    {
        $this->service = $ruang_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruangs = $this->service->paginated();
        return view('ruangs.index')->with('ruangs', $ruangs);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $ruangs = $this->service->search($request->search);
        return view('ruangs.index')->with('ruangs', $ruangs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RuangCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangCreateRequest $request)
    {
        $request->merge([
            'status'=>'0',
        ]);
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('ruangs.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('ruangs.index'))->withErrors('Failed to create');
    }

    /**
     * Display the ruang.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruang = $this->service->find($id);
        return view('ruangs.show')->with('ruang', $ruang);
    }

    /**
     * Show the form for editing the ruang.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang = $this->service->find($id);
        return view('ruangs.edit')->with('ruang', $ruang);
    }

    /**
     * Update the ruangs in storage.
     *
     * @param  App\Http\Requests\RuangUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RuangUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->withErrors('Failed to update');
    }

    /**
     * Remove the ruangs from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('ruangs.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('ruangs.index'))->withErrors('Failed to delete');
    }
}
