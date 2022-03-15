<?php

namespace App\Http\Controllers;

use App\Models\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return void
     */
    public function index()
    {
        return Users::all();
    }

}
