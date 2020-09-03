<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GuestBook;
use App\Http\Resources\BookResource as BookResource;
use App\Http\Requests\BookRequest;

class BookController extends Controller
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
        return (new BookResource($guestbook));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //
        $guestbook = new GuestBook([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address')
        ]);
        $guestbook->save();
        return (new BookResource($guestbook));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $guestbook = GuestBook::find($id);
        $guestbook->first_name =  $request->get('first_name');
        $guestbook->last_name = $request->get('last_name');
        $guestbook->email = $request->get('email');
        $guestbook->phone = $request->get('phone');
        $guestbook->gender = $request->get('gender');
        $guestbook->address = $request->get('address');       
        $guestbook->save();
        return (new BookResource($guestbook));
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
        return response()->json("ok");

    }
}
