<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Salary;
use App\Employee;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View('home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nombre' => 'required|max:100',
			'apaterno' => 'required|max:100',
			'amaterno' => 'required|max:100',
			'fecha_nacimiento' => 'required|date:dd/mm/YYYY',
			'ingresos' => 'required',
		]);

		if ($validator->fails()) {
			return response()->json(['messages' => $validator->messages()], 400);
		} else {
			$employee = Employee::create([
							'nombre' => $request->nombre, 
							'apaterno' => $request->apaterno, 
							'amaterno' => $request->amaterno, 
						]);

			Salary::create([
				'employee_id' => $employee->id,
				'fecha_nacimiento' => date('Y-m-d', strtotime($request->fecha_nacimiento)),
				'ingreso' => str_replace(',', '', $request->ingresos)
			]);
			return response()->json(['messages' => 'Empleado creado con exito'], 201);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function search(Request $request)
	{
		if ($request->find) {
			$employee = Employee::with('salary')->where('id', $request->find)->orWhere('nombre', 'LIKE' ,'%'.$request->find.'%')->get();
			if ($employee) {
				return response()->json(['data' => $employee], 200);
			}

			return response()->json(['message' => 'Not Found'], 404);
		} else {
			return response()->json(['data' => Employee::with('salary')->get()], 200);
		}
		
	}

}
