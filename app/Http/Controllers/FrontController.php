<?php

namespace App\Http\Controllers;

# use App\Models\Complaint;

use App\Models\Complaint;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function semuaPengaduan()
    {
        $data = Complaint::all();
        return view('front.semua-pengaduan',[
            'data' => $data
        ]);
    }

    function semuaStatistik() {
        $all = Complaint::count();
        $pending = Complaint::where('status', 'pending')->count();
        $proses = Complaint::where('status', 'proses')->count();
        $selesai = Complaint::where('status', 'selesai')->count();

        return view('front.statistik', [
            'all' => $all,
            'pending' => $pending,
            'process' => $proses,
            'done' => $selesai
        ]);
    }

    function formPengaduan() {
        return view('front.form-pengaduan');

    }
        function storeComplaint(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'image' => 'required|string|mimes:jpg, jpeg, png|max:2048',
            'email' => 'required|string|max:unique',
            'dsecription' => 'required|string|'
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/complaints_pengguna');
        }
        
        $user = Auth::user();

        $complaint = new Complaint();
        $complaint->guest_name = $request->name;
        $complaint->guest_email = $request->email;
        $complaint->guest_telp = $request->telp;
        $complaint->image = $imagePath ? basename($imagePath) : null;
        $complaint->title = $request->title;
        $complaint->description = $request->description;
    }
}
