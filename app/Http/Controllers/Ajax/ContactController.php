<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use App\Mail\AdminFeedbackMailer;
use App\Mail\FeedbackMailer;
use App\Models\AdminMail;
use App\Models\Event;
use App\Models\Mails;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Generator;
use stdClass;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $adminMail = AdminMail::first();
        $token = md5(uniqid(''));
        $request->request->add(['token' => $token]);

//        dd($request);
        $request->validate([
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'email' => 'required|email|max:100',
            'phone_number'=>'required|max:100',
            'comment' => 'max:500',
            'city'=>'required|max:100',
            'person'=>'required|max:100',
            'date'=>'required',
            'event_id'=>'required|max:100',
            'token'=>'required|max:100'
        ]);

//        dd($request);

        $data = new stdClass();
        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->email = $request->email;
        $data->city = $request->city;
        $data->card = $request->card;
        $data->phone_number = $request->phone_number;
        $data->date = $request->date;
        $data->comment = $request->comment;
        $data->token = $request->token;

        $event = Event::find($request->event_id);

        $data->event_title = $event->title;
        $data->event_type = $event->type;

//        dd($event);

            Mail::to($adminMail->email)->send(new AdminFeedbackMailer($data));
            Mail::to($data->email)->send(new FeedbackMailer($data));


        $this->store($request);
        return true;
    }

    public function store(Request $request){
//        $request->validated();
        $mail = new Mails();
        $mail->fill($request->all());
        $mail->save();
        return true;
    }
}
