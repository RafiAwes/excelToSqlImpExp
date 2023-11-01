<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{

    /**

     * @return \Illuminate\Support\Collection

     */

    public function index()
    {
        $users = User::get();

        return view('users', compact('users'));
    }

    /**

     * @return \Illuminate\Support\Collection

     */

    public function import()
    {
        $file = request()->file('file');

        if (!is_null($file)) {
            $fileExtension = $file->extension();

            Excel::import(new UsersImport, $file, $fileExtension);
        } else {
            // Handle the case where the user does not select a file to import.
            // For example, you could flash a message to the user saying "Please select a file to import."
        }

        return back();
    }

    /**

     * @return \Illuminate\Support\Collection

     */

    public function export()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
}
