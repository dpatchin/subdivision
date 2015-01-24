<?php

class DevelopersController extends BaseController {

	/**
	 * Developer Repository
	 *
	 * @var Developer
	 */
	protected $developer;

	public function __construct(Developer $developer)
	{
		$this->developer = $developer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$developers = $this->developer->all();

		return View::make('developers.index', compact('developers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('developers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Developer::$rules);

		if ($validation->passes())
		{
			$this->developer->create($input);

			return Redirect::route('developers.index');
		}

		return Redirect::route('developers.create')
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
		$developer = $this->developer->findOrFail($id);

		return View::make('developers.show', compact('developer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$developer = $this->developer->find($id);

		if (is_null($developer))
		{
			return Redirect::route('developers.index');
		}

		return View::make('developers.edit', compact('developer'));
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
		$validation = Validator::make($input, Developer::$rules);

		if ($validation->passes())
		{
			$developer = $this->developer->find($id);
			$developer->update($input);

			return Redirect::route('developers.show', $id);
		}

		return Redirect::route('developers.edit', $id)
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
		$this->developer->find($id)->delete();

		return Redirect::route('developers.index');
	}

}
