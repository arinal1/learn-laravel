<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDataUploadController extends Controller
{
    public function index()
    {
        return view('student.data.upload');
    }

    public function upload(Request $request)
    {
        $json = [];
        $destination = 'studentdata';
        $profile = $request->file('profile');
        if ($profile == null) {
            $json = [
                'success' => false,
                'message' => 'Foto Profil Tidak Boleh Kosong'
            ];
        } else {
            $profile->move($destination, $profile->getClientOriginalName());
            $certificate = $request->file('certificate');
            if ($certificate != null) $certificate->move($destination, $certificate->getClientOriginalName());
            $cv = $request->file('cv');
            if ($cv != null) $cv->move($destination, $cv->getClientOriginalName());
            $json = [
                'success' => true,
                'message' => 'Berhasil menyimpan data'
            ];
        }
        return redirect('student/data/upload')->with('result', $json);
    }
}
