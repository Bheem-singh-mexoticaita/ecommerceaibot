<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
class ProfileController extends Controller
{
    public function view(Request $request): View
    {
        return view('admin.profile.profile_view', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request){



    }

}
