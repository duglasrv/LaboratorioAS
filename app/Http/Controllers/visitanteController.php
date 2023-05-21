<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevisitanteRequest;
use App\Http\Requests\UpdatevisitanteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\visitante;
use Illuminate\Http\Request;
use Flash;
use Response;

class visitanteController extends AppBaseController
{
    /**
     * Display a listing of the visitante.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var visitante $visitantes */
        $visitantes = visitante::paginate(15);

        return view('visitantes.index')
            ->with('visitantes', $visitantes);
    }

    /**
     * Show the form for creating a new visitante.
     *
     * @return Response
     */
    public function create()
    {
        return view('visitantes.create');
    }

    /**
     * Store a newly created visitante in storage.
     *
     * @param CreatevisitanteRequest $request
     *
     * @return Response
     */
    public function store(CreatevisitanteRequest $request)
    {
        $input = $request->all();

        /** @var visitante $visitante */
        $visitante = visitante::create($input);

        Flash::success('Visitante saved successfully.');

        return redirect(route('visitantes.index'));
    }

    /**
     * Display the specified visitante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var visitante $visitante */
        $visitante = visitante::find($id);

        if (empty($visitante)) {
            Flash::error('Visitante not found');

            return redirect(route('visitantes.index'));
        }

        return view('visitantes.show')->with('visitante', $visitante);
    }

    /**
     * Show the form for editing the specified visitante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var visitante $visitante */
        $visitante = visitante::find($id);

        if (empty($visitante)) {
            Flash::error('Visitante not found');

            return redirect(route('visitantes.index'));
        }

        return view('visitantes.edit')->with('visitante', $visitante);
    }

    /**
     * Update the specified visitante in storage.
     *
     * @param int $id
     * @param UpdatevisitanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevisitanteRequest $request)
    {
        /** @var visitante $visitante */
        $visitante = visitante::find($id);

        if (empty($visitante)) {
            Flash::error('Visitante not found');

            return redirect(route('visitantes.index'));
        }

        $visitante->fill($request->all());
        $visitante->save();

        Flash::success('Visitante updated successfully.');

        return redirect(route('visitantes.index'));
    }

    /**
     * Remove the specified visitante from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var visitante $visitante */
        $visitante = visitante::find($id);

        if (empty($visitante)) {
            Flash::error('Visitante not found');

            return redirect(route('visitantes.index'));
        }

        $visitante->delete();

        Flash::success('Visitante deleted successfully.');

        return redirect(route('visitantes.index'));
    }
}
