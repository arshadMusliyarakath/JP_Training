<?php

namespace App\Http\Controllers;

use App\Jobs\NewUserJob;
use App\Mail\UserCreatedMail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Rap2hpoutre\FastExcel\FastExcel;

class FrondEndController extends Controller
{
    public function homePage()
    {

        $users = User::withCount('orders')->withTrashed()->latest()->paginate(6); // select * from users

        // $val = collect([1, 2, 3,10, 4, 5, 6]);
        // return $val->random();

        // $str = "Arshad";
        // return Str::length($str);

        // $str = Str::of('laravel');
        // return $str->ucfirst();

        return view('welcome', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    public function save()
    {

        request()->validate([
            'name' => 'required',
            'email' => 'unique:App\Models\User,email',

        ]);
        $input = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt('shabanu'),
            'dob' => request('dob'),
            'status' => request('status')
        ];

        if (request()->hasFile('image')) {
            $extnsion = request('image')->extension();
            $filename = 'user_pic' . time() . '.' . $extnsion;
            request('image')->storeAs('images', $filename);
            $input['image'] = $filename;
        }

        //observe
        $user = User::create($input);

        //muted observe
        // User::withoutEvents(function () use ($input) {
        //     $user = User::create($input);
        // });

       NewUserJob::dispatch($user);

        // cache()->forget('users');

        // Mail::to($user->email)
        // ->cc("abc@mail.com")
        // ->bcc("xyz@mail.com")
        // ->send(new UserCreatedMail($user));

        // $data = User::firstOrCreate([

        //     'email' => request('email'),

        // ], [
        //     'name' => request('name'),
        //     'dob' => request('dob'),
        //     'status' => request('status')
        // ]);

        //  $data = User::updateOrCreate([

        //     'email' => request('email'),

        // ], [
        //     'name' => request('name'),
        //     'dob' => request('dob'),
        //     'status' => request('status')
        // ]);

        return redirect()->route('home')->with('message', "User Created Successfully!!!");
    }

    public function export()
    {
        // Load users
        $users = User::all();

        // Export all users
        return (new FastExcel($users))->download('users_export.xlsx');
    }

    public function pdf()
    {
        $users = User::get();
        $pdf = PDF::loadView('pdf.invoice', ['users' => $users]);
        return $pdf->stream('invoice.pdf');
    }

    public function edit($userId)
    {
        $user = User::find(decrypt($userId));
        return view('users.edit', compact('user'));
    }
    public function viewUser($userId)
    {
        $user = User::find(decrypt($userId));
        return $user->addressCheck;
        //return view('users.view', compact('user'));
    }

    public function update()
    {
        $userId = decrypt(request('user_id'));
        $user = User::find($userId);

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'dob' => request('dob'),
            'status' => request('status')
        ]);
        cache()->forget('users');
        return redirect()->route('home')->with('message', "User Updated Successfully!!!");
    }

    public function delete($userId)
    {
        $usId = decrypt($userId);

        //option: 1
        // $user = User::find($usId)->delete();

        //option: 2
        //if you have primaryKey
        $user = User::destroy($usId);
        cache()->forget('users');
        return redirect()->route('home')->with('message', "User Deleted Successfully!!!");
    }

    public function forceDelete($userId)
    {
        $usId = decrypt($userId);
        $user = User::find($usId)->forceDelete();
        cache()->forget('users');
        return redirect()->route('home')->with('message', "Permenantly Deleted Successfully!!!");
    }

    public function activate($userId)
    {
        $user = User::withTrashed()->find(decrypt($userId))->restore();
        cache()->forget('users');
        return redirect()->route('home')->with('message', "User Restrored Successfully!!!");
    }
}
