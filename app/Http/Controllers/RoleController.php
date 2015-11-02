<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//HTTP Requests
use App\Http\Requests\Role\RoleCreateRequest;
use App\Http\Requests\Role\RoleUpdateRequest;

//Services
use App\Services\RoleService;
use App\Services\AccessLevelService;


class RoleController extends Controller
{


    /**
     * Role Object
     * @var [type]
     */
    protected $role;


    public function __construct( RoleService $role, AccessLevelService $accessLevel  )
    {
        $this->role = $role;
        $this->accessLevel = $accessLevel;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("KEN WAS HERE");
        $data = $this->role->get();
        return view('roles.index',$data)->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd( $this->accessLevel->get() );
        //$data['role'] = array();
        $data['accessLevels'] =$this->accessLevel->get();
        return view('roles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        //dd($request->all());
        $this->role->save( $request->all() );
        return redirect( '/role' )->with('message', 'Sucessfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role'] = $this->role->get($id);
        $data['accessLevels'] = $this->accessLevel->get();

        //dd($data['accessLevels']);
        
        return view('roles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $s = $this->role->save( $request->all() );
        return redirect( '/role/'.$id.'/edit' )->with('message', 'Sucessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
