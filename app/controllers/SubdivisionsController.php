<?php

class SubdivisionsController extends BaseController {

	/**
	 * Subdivision Repository
	 *
	 * @var Subdivision
	 */
	protected $subdivision;

	public function __construct(Subdivision $subdivision)
	{
		$this->subdivision = $subdivision;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subdivisions = $this->subdivision->all();

		return View::make('subdivisions.index', compact('subdivisions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subdivisions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Subdivision::$rules);

		if ($validation->passes())
		{
			$this->subdivision->create($input);

			return Redirect::route('subdivisions.index');
		}

		return Redirect::route('subdivisions.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subdivision = $this->subdivision->findOrFail($id);

		return View::make('subdivisions.show', compact('subdivision'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subdivision = $this->subdivision->find($id);

		if (is_null($subdivision))
		{
			return Redirect::route('subdivisions.index');
		}

		return View::make('subdivisions.edit', compact('subdivision'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Subdivision::$rules);

		if ($validation->passes())
		{
			$subdivision = $this->subdivision->find($id);
			$subdivision->update($input);

			return Redirect::route('subdivisions.show', $id);
		}

		return Redirect::route('subdivisions.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->subdivision->find($id)->delete();

		return Redirect::route('subdivisions.index');
	}

}
