<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Store;
use App\Http\Requests\User\Update;
use App\Models\User;
use DB;
use Exception;
use Hash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $email;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:user-list');
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $roles = Role::get();
        $user = new User();
        return view('admin.user.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     *
     * @return RedirectResponse
     */
    public function store(Store $request): RedirectResponse
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.edit', $user)->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     *
     * @return Factory|View
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     *
     * @return Factory|View
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.user.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User  $user
     * @param  Update  $request
     *
     * @return RedirectResponse
     */
    public function update(User $user, Update $request): RedirectResponse
    {
        if (!empty($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }

        $user->update($request->all());
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

}
