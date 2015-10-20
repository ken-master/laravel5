<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


//HTTP Requests
use App\Http\Requests\AccessLevel\AccessLevelCreateRequest;
use App\Http\Requests\AccessLevel\AccessLevelUpdateRequest;


//Services
use App\Services\AccessLevelService;
use App\Services\PermissionService;



class AccessLevelController extends Controller
{




    protected $permission;
    protected $accessLevel;

    public function __construct(AccessLevelService $accessLevel, PermissionService $permission)
    {
        $this->permission = $permission;
        $this->accessLevel = $accessLevel;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $data = $this->accessLevel->get();

        return view('access_level.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions'] = $this->permission->get();
        
        return view('access_level.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccessLevelCreateRequest $request)
    {
        $this->accessLevel->save( $request->all() );
        return redirect( '/access_level' )->with('message', 'Sucessfully Created');
      
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
        $data = array();
        return view('access_level.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccessLevelUpdateRequest $request, $id)
    {
        //
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
