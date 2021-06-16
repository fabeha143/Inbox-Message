<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inbox;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inboxdata = inbox::where('To', Auth::user()->id)->get();
        return view('inbox', ['inboxdata' => $inboxdata]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = User::select('id','email')->get();
        $To = array();
        foreach( $items as $item )
        {
            $To[$item->id] = $item->email;
        }
        
        return view('add_message',compact('To'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        inbox::create([
            'To' => $request->To,
            'subject' => $request->subject,
            'message' => $request->message,
            'from' => auth()->id()
        ]);
        return redirect(route('inbox.index'))->with(['success' => 'Message sent!!']);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        inbox::where('id' , $id)->delete();
        return redirect(route('inbox.index'))->with(['success' => 'Message Deleted!!']);
    }
}
