<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use App\Models\Raiting;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.feedback.index',compact('feedback'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
//        dd($request);

        $this->validate($request, [
            'raiting' => 'required',
            'club_id' => 'required',
            'status' => 'required',
            'message' => 'required|string',
        ]);


        $feedback->raiting = $request->raiting;
        $feedback->status = $request->status;
        $feedback->message = $request->message;
        $feedback->save();


        if ($request->status == 1){

            $raiting_feedback = Feedback::where('club_id', $feedback->club_id)->where('status', 1)->get()  ;
            $sum_club_raiting = 0;
            for ($i = 0; $i < count($raiting_feedback); $i++){
                $sum_club_raiting += $raiting_feedback[$i]['raiting'];
            }

            $sum_feedback_raiting = round($sum_club_raiting/count($raiting_feedback),2);
            $club_raiting = Raiting::where('club_id',$feedback->club_id)->first();
            $club_raiting->raiting = $sum_feedback_raiting;
            $club_raiting->save();
        }



//        dd($request);

//        $feedback->update($request->all());

//        dd($feedback);
        return redirect()->route('admin.feedback.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedback.index')->with('status', 'Вы успешно удалили комментарий');
    }

    public function sendFeedback(Request $request)
    {
//        dd($request);

        $this->validate($request, [
            'text' => 'required|string',
            'stars'=>'required|integer'
        ]);

        $feedback = new Feedback;
        $feedback->message = $request->text;
        $feedback->club_id = intval($request->club_id);
        $feedback->user_id = Auth::id();
        $feedback->raiting = $request->stars;
        $feedback->save();

        return back();
    }
}
