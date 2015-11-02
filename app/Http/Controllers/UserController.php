<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

//repository
use App\Services\UserService;
use App\Services\RoleService;
//requests

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests;

//use Illuminate\Http\Request;



class UserController extends Controller {


	protected $user;
	protected $role;

	public function __construct(UserService $user, RoleService $role)
	{
		$this->user = $user;
		$this->role = $role;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$data = $this->user->get();
		//dd($data);
		return view( 'users.index' )->with('data' , $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['roles'] = $this->role->getRolesIdName();
		$data['status'] = $this->user->getStatuses();

		return view( 'users.create',$data );
	}

	/**
	 * Store a newly created User in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest $request)
	{
		//dd( $request->all() );
		$this->user->save( $request->all() );

		return redirect( '/user' )->with('message', 'Sucessfully Created');
	}

	/**
	 * Display the specified User by Id.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('users.show');
	}

	/**
	 * Show the form for editing the specified User by Id.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		

		$data['user'] 	= $this->user->get($id);
		$data['roles'] 	= $this->role->getRolesIdName();
		$data['status'] = $this->user->getStatuses();

		return view( 'users.edit', $data );
	}

	/**
	 * Update the specified User in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,UserUpdateRequest $request)
	{	
		

		$s = $this->user->save( $request->all() );
		return redirect( '/user/'.$id.'/edit' )->with('message', 'Sucessfully Updated');
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

}
