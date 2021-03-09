<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Role;
use Flash;
use Response;
use Redirect;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['roles'] = Role::orderBy('role_id','DESC')->get()->toArray();

        return view('roles.index',$data);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $role = array(
            'name' => $request->name,
        );

        Role::create($role);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        // $role = $this->roleRepository->find($id);

        // if (empty($role)) {
        //     Flash::error('Role not found');

        //     return redirect(route('roles.index'));
        // }

        // return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit()
    {
        // $role = $this->roleRepository->find($id);

        // if (empty($role)) {
        //     Flash::error('Role not found');

        //     return redirect(route('roles.index'));
        // }

        // return view('roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        if($request->name=='')
        {
             $role = array();
        }else
        {
            $role = array(
                    'name' => $request->name,
             );
        }

        if (empty($role)) {

            Flash::error('Please fill up role name input field!');

            return redirect(route('roles.index'));

        }else{
            Role::findOrfail($request->role_id)->update($role);

            Flash::success('Role updated successfully.');

            return redirect(route('roles.index'));
        }
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        $delete_role= Role::findOrfail($request->role_id);
        $delete_role->delete();

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }
}
