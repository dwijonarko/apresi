<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Str;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $role = \App\Models\Role::pluck('name','id');
        return view('users.create')->with(compact('role'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/uploads/avatar/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $request->avatar->move(public_path($folder), $filePath);
            $input['avatar'] = $filePath;
        }

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $role = \App\Models\Role::pluck('name','id');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user)->with('role',$role);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $data = $request->filled('password') ? $request->all() : $request->except('password');
        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/uploads/avatar/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $request->avatar->move(public_path($folder), $filePath);
            if(is_file(public_path($user->avatar))){
                unlink(public_path($user->avatar));
            } 
            $data['avatar'] = $filePath;
        }
        $user = $this->userRepository->update($data, $id);

        Flash::success('User updated successfully.');
        return redirect(route('profile.show',[$user]));
        
        // return view('users.show')->with('user', $user);
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
