<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\User\UserService;

class UserController extends Controller
{
    private $name = 'user';
    public function __construct(
        protected UserService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = $this->service->index();
        return view('dashboard.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $this->service->store($input);
        return redirect()->route('user.index')->withSuccess("Data $this->name berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('dashboard.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('dashboard.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        \Log::info('update user: '. json_encode($request->all()));

        $input = $request->validated();
        \Log::info('update user: '. json_encode($input));
        $this->service->update($input, $user);
        return redirect()->route('user.index')->withSuccess("Data $this->name berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        \Log::info('destroy user: '. json_encode($user));

        $data = $this->service->destroy($user);
        if ($data) {
            return redirect()->route('user.index')->withSuccess("Data $this->name berhasil dihapus.");
        } else {
            return redirect()->route('user.index')->withError("Data $this->name tidak bisa dihapus karena sudah tercatat pada Data Transaksi.");
        }
    }
}
