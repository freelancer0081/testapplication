<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestBook;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $guestbook = GuestBook::all();

        return view('guestbook.index', compact('guestbook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('guestbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:guest_books',
            'phone'=>'nullable|numeric',
            'gender'=>'required',
            'address'=>'required',
        ]);

        $guestbook = new GuestBook([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address')
        ]);
        $guestbook->save();
        return redirect('/guestbook')->with('success', 'Data saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $guestbook = GuestBook::find($id);
        return view('guestbook.edit', compact('guestbook'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'phone'=>'nullable|numeric',
            'gender'=>'required',
            'address'=>'required',
        ]);

        $guestbook = GuestBook::find($id);
        $guestbook->first_name =  $request->get('first_name');
        $guestbook->last_name = $request->get('last_name');
        $guestbook->email = $request->get('email');
        $guestbook->phone = $request->get('phone');
        $guestbook->gender = $request->get('gender');
        $guestbook->address = $request->get('address');       
        $guestbook->save();

        return redirect('/guestbook')->with('success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $guestbook = GuestBook::find($id);
        $guestbook->delete();

        return redirect('/guestbook')->with('success', 'Data deleted!');
    }
}
