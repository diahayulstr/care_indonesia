<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function master_addDonor() {
        return view('donor.master.add_master');
    }
}
