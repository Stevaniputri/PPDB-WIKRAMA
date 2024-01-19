<?php

namespace App\Http\Controllers;

use App\Models\Ppdbs;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PpdbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landing()
    {
        return view('landing');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function login() {
        return view('login');
    }

    public function dashboard() {
        $users = Ppdbs::all();
        return view('dashboard', compact('users'));
    }

    public function proof($id)
    {
        $databukti = Payment::latest()->paginate(1);
        $showbukti = Payment::where('ppdbs_id', $id)->first();
        return view('proof', compact('showbukti', 'databukti'));
    }

    public function detail()
    {
        $alldata = Ppdbs::latest()->paginate(1);
        return view('/detail', compact('alldata'));
    }

    public function verifikasi() {
        $datasiswa = Payment::get();
        return view('verifikasi', compact('datasiswa'));
    }

    public function result()
    {
        $ppdb = Ppdbs::all();
        return view('result', compact('ppdb'));
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => "This username doesn't exists"
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect('/dashboard');
        } else {
            return redirect('/login')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|max:9|min:8',
            'name' => 'required',
            'school' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'major' => 'required',

        ]);

        Ppdbs::create([
            'nisn' => $request->nisn,
            'name' => $request->name,
            'school' => $request->school,
            'gender' => $request->gender,
            'email' => $request->email,
            'major' => $request->major,
            'status' => 0,
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->nisn),
            'name' => $request->name,
            'role' => 'user',
        ]);

        return redirect('/result');
    }

    public function payment() {
        $datapendaftaran = Ppdbs::with('payment')->get();
        $datasiswa = Payment::where('ppdbs_id', "=", Auth::user()->id)->first();
        return view('payment', compact('datasiswa', 'datapendaftaran'));
    }


    public function payment_update(Request $request)
    {
        $request->validate([
            'pemilik' => 'required',
            'rekening' => 'required',
            'nominal' => 'required',
            'bukti' => 'required|image|file|max:3000',
        ]);

        // $pendaftaran = Payment::where("email", Auth::user()->email)->value("id");
        $bukti = time().'.'.$request->bukti->extension();
        $request->bukti->move(public_path('images'), $bukti);


        Payment::where("ppdbs_id", "=", Auth::user()->id)->update([
            'ppdbs_id' => Auth::user()->id,
            'pemilik' => $request->pemilik,
            'rekening' => $request->rekening,
            'nominal' => $request->nominal,
            'bukti' => $bukti,
            'status' => 'pending',
        ]);

        return redirect('/dashboard')->with('successUploading', 'n');


    }

    public function success($id)
    {
        Payment::where("ppdbs_id", '=', $id)->update([
            'status' => 'success'
        ]);
        return redirect()->back();
    }

    public function failed($id)
    {
        Payment::where("ppdbs_id", '=', $id)->update([
         'status' => 'failed'
        ]);
        return redirect()->back();
    }

    public function pembayaran(Request $request)
    {
        $request->validate([
            'pemilik' => 'required',
            'rekening' => 'required',
            'nominal' => 'required',
            'bukti' => 'required|image|file|max:3000',
        ]);

        // $pendaftaran = Ppdbs::where("email", Auth::user()->email)->value("id");

        $bukti = time().'.'.$request->bukti->extension();
        $request->bukti->move(public_path('images'), $bukti);
        // dd($request->all());

        Payment::create([
            'ppdbs_id' => Auth::user()->id,
            'pemilik' => $request->pemilik,
            'rekening' => $request->rekening,
            'nominal' => $request->nominal,
            'bukti' => $bukti,
        ]);

        return redirect('/dashboard')->with('successUploading', 'B');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ppdbs  $ppdbs
     * @return \Illuminate\Http\Response
     */
    public function show(Ppdbs $ppdbs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ppdbs  $ppdbs
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppdbs $ppdbs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ppdbs  $ppdbs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ppdbs $ppdbs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ppdbs  $ppdbs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppdbs $ppdbs)
    {
        //
    }
}
