<?php
namespace App\Http\Controllers\User;

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
        //dd($this->accessLevel->getRouteList());
        $data['permissions'] = $this->accessLevel->getRouteList();
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
       
        //dd( $this->accessLevel->getRouteList() );

        $data['access_level']   = $this->accessLevel->get($id);
        $data['permissions'] = $this->accessLevel->getRouteList();
        
         return view('access_level.edit', $data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, AccessLevelUpdateRequest $request)
    {
       
        $s = $this->accessLevel->save( $request->all() );
        return redirect( '/access_level/'.$id.'/edit' )->with('message', 'Sucessfully Updated');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cast it as Integer
        //$id = (int) $id;
        //dd($id);
        $s = $this->accessLevel->delete( $id );
        return redirect( '/access_level' )->with('message', 'Sucessfully Deleted');
    }
}
