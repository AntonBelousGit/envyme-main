<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Mails;

class BookingRequestController extends Controller
{
    public function index(){
        $mails = Mails::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.booking_request.index', compact('mails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mails  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mails $mail){
        $event = Event::where('id',$mail->event_id)->get();
        return view('admin.booking_request.edit', compact('mail', 'event'));
    }
    public function show(Mails $mail){
        $event = Event::where('id',$mail->event_id)->get();
        return view('admin.booking_request.show', compact('mail', 'event'));
    }
    public function  destroy($id){
        $mails = Mails::where('id', $id)->first();
        $mails->delete();
        return redirect()->route('admin.mails.index')->with('status', 'Вы успешно удалили запрос бронирования');
    }
}

