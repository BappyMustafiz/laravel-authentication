<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }


    /**
     * admin login
     */
    public function adminLogin()
    {
        return view('backend.auth.login');
    }
    /**
     * admin login post
     */
    public function adminLoginPost(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && $user->name != 'admin') {
            throw ValidationException::withMessages([
                'email' => 'Invalid email!',
            ]);
        }
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
    /**
     * admin logout
     */
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isVerified = '')
    {

        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {

            if ($isVerified == 'email_verified_at') {
                $users = User::orderBy('id', 'desc')->whereNull('name')->whereNotNull('email_verified_at')->get();
            } else if ($isVerified == 'email_verified_at') {
                $users = User::orderBy('id', 'desc')->whereNull('name')->whereNull('email_verified_at')->get();
            } else {
                $users = User::orderBy('id', 'desc')->whereNull('name')->get();
            }
            $datatable = DataTables::of($users)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View User Details" href="' . route('users.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';

                        $verifyRoute = route('users.verify', [$row->id]);
                        $deleteRoute =  route('users.destroy', [$row->id]);
                        $unverifyRoute = route('users.unverify', [$row->id]);


                        if (!$row->email_verified_at) {
                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm-custom ml-1" title="Verify" id="verifyUser' . $row->id . '"><i class="icofont icofont-check"></i></a>';
                            $html .= '
                            <form id="verifyForm' . $row->id . '" action="' . $verifyRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="icofont icofont-check"></i> Confirm Unverify</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        } else {
                            $html .= '<a class="btn waves-effect waves-light btn-warning btn-sm-custom ml-1" title="Unverify" id="unverifyUser' . $row->id . '"><i class="icofont icofont-ui-close"></i></a>';
                            $html .= '
                            <form id="unverifyForm' . $row->id . '" action="' . $unverifyRoute . '" method="post" style="display:none">' . $csrf . $method_put . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="icofont icofont-check"></i> Confirm Unverify</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        }

                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete User" id="deleteUser' . $row->id . '"><i class="icofont icofont-trash"></i></a>';


                        $html .= '<script>
                            $("#deleteUser' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "User will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#verifyUser' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "User will be verified!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, verify it!"
                                }).then((result) => { if (result.value) {$("#verifyForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#unverifyUser' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "User will be unverified!",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, unverify it!"
                                }).then((result) => { if (result.value) {$("#unverifyForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="icofont icofont-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )
                ->editColumn('first_name', function ($row) {
                    return $row->first_name;
                })
                ->editColumn('last_name', function ($row) {
                    return $row->last_name;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('email_verified_at', function ($row) {
                    if ($row->email_verified_at) {
                        return '<span class="label label-success font-weight-100">Verified</span>';
                    } else {
                        return '<span class="label label-danger">Unverified</span>';
                    }
                });
            $rawColumns = ['action', 'first_name', 'last_name', 'email', 'email_verified_at'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }

        $count_users = count(User::whereNull('name')->select('id')->get());
        $count_verified_users = count(User::select('id')->whereNull('name')->whereNotNull('email_verified_at')->get());
        $count_unverified_users = count(User::select('id')->whereNull('name')->whereNull('email_verified_at')->get());
        return view('backend.dashboard.admin.users.index', compact('count_users', 'count_verified_users', 'count_unverified_users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $user = User::find($id);
        if (is_null($user)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('users.index');
        }
        return view('backend.dashboard.admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $user = User::find($id);
        if (is_null($user)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('users.index');
        }
        $user->delete();

        session()->flash('success', 'User has been deleted permanently !!');
        return redirect()->back();
    }

    /**
     * verify
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function verify($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $user = User::find($id);
        if (is_null($user)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('users.index');
        }
        $user->email_verified_at = now();
        $user->save();

        session()->flash('success', 'User verified successfully !!');
        return redirect()->back();
    }

    /**
     * verify
     *
     * @param integer $id
     * @return Remove the item from trash to active -> make deleted_at = null
     */
    public function unverify($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $user = User::find($id);
        if (is_null($user)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('users.index');
        }
        $user->email_verified_at = null;
        $user->save();

        session()->flash('success', 'User unverified successfully !!');
        return redirect()->back();
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function verified()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index('email_verified_at');
    }
    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function unverified()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return $this->index('email_verified_at');
    }
}
