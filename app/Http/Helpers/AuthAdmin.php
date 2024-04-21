<?php

namespace App\Http\Helpers;

use Auth;
use App\Models\Admin;

class AuthAdmin
{
    public function get()
    {
        $data = Auth::guard('admin')->user()->toArray();

        return $data;
    }

    public function get_photo($size = [90,90],$admin_id = -1)
    {
        return '<img src="/admin_files/assets/images/nouser.jpg" class="rounded-circle p-1 border" width="'.$size[0].'" height="'.$size[1].'">';
    }
}
