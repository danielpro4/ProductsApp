<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\UserInterface;
use App\User;
use Illuminate\Http\Request;

class UsersController extends BaseController
{

    /**
     * @var UserInterface
     */
    private $users;

    /**
     * UsersController constructor.
     * @param UserInterface $users
     */
    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view($this->namespace . 'users.index')->with(['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view($this->namespace . 'users.form', [
            'user' => new User
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {

        $this->users->store($request->all());

        return redirect()
            ->route($this->namespace . 'users.all')
            ->with('success', 'Usuario registrado correctamente');
    }

    /**
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(User $user)
    {
        return view($this->namespace . 'users.form', [
            'user'  => $user,
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $task
     */
    public function edit(User $user)
    {
        return view($this->namespace . 'users.form', [
            'user' => $user
        ]);
    }

    /**
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $user)
    {
        $user = $this->users->update($request->all(), $user);

        return redirect()->route('user.form', $user)
            ->with('user', $user)
            ->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * @param $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($task)
    {
        $this->users->destroy($task);

        return redirect()
            ->route('users.all')
            ->with('success', 'Usuario eliminado correctamente');
    }

}
