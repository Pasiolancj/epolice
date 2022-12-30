<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $users = User::all();
        $barangays = ['Bagacay', 'Bajumpandan', 'Balugo', 'Banilad', 'Bantayan', 'Barangay Pob. 1 (Tinago)', 'Barangay Pob. 2 (Upper Lukewright)', 
        'Barangay Pob. 3 (Business District)', 'Barangay Pob. 4 (Rizal Boulevard)', 'Barangay Pob. 5 (Silliman Area)', 'Barangay Pob. 6 (Cambagroy)', 
        'Barangay Pob. 7 (Mangga)', 'Barangay Pob. 8 (Cervantes Extension)', 'Batinguel', 'Buñao', 'Cadawinonan', 'Calindagan', 'Camanjac', 'Candau-ay', 
        'Cantil-e', 'Daro', 'Junob', 'Looc', 'Mangnao-Canal', 'Motong', 'Piapi', 'Pulantubig', 'Tabuc-tubig', 'Taclobo', 'Talay'];

        return view('admin.reports.report', compact('users' , 'barangays'));
    }
}