<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateasRequest;
use App\Http\Requests\UpdateasRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\as;
use Illuminate\Http\Request;
use Flash;
use Response;

class asController extends AppBaseController
{
    /**
     * Display a listing of the as.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var as $as */
        $as = as::paginate(15);

        return view('as.index')
            ->with('as', $as);
    }

    /**
     * Show the form for creating a new as.
     *
     * @return Response
     */
    public function create()
    {
        return view('as.create');
    }

    /**
     * Store a newly created as in storage.
     *
     * @param CreateasRequest $request
     *
     * @return Response
     */
    public function store(CreateasRequest $request)
    {
        $input = $request->all();

        /** @var as $as */
        $as = as::create($input);

        Flash::success('As saved successfully.');

        return redirect(route('as.index'));
    }

    /**
     * Display the specified as.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var as $as */
        $as = as::find($id);

        if (empty($as)) {
            Flash::error('As not found');

            return redirect(route('as.index'));
        }

        return view('as.show')->with('as', $as);
    }

    /**
     * Show the form for editing the specified as.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var as $as */
        $as = as::find($id);

        if (empty($as)) {
            Flash::error('As not found');

            return redirect(route('as.index'));
        }

        return view('as.edit')->with('as', $as);
    }

    /**
     * Update the specified as in storage.
     *
     * @param int $id
     * @param UpdateasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateasRequest $request)
    {
        /** @var as $as */
        $as = as::find($id);

        if (empty($as)) {
            Flash::error('As not found');

            return redirect(route('as.index'));
        }

        $as->fill($request->all());
        $as->save();

        Flash::success('As updated successfully.');

        return redirect(route('as.index'));
    }

    /**
     * Remove the specified as from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var as $as */
        $as = as::find($id);

        if (empty($as)) {
            Flash::error('As not found');

            return redirect(route('as.index'));
        }

        $as->delete();

        Flash::success('As deleted successfully.');

        return redirect(route('as.index'));
    }
}
