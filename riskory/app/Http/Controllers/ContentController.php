<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::all();
        return view('controls.content.index',compact('contents'));
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
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        //
        return view('controls.content.edit',compact('content'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);

       

        $bp = $content->update($request->all());
        if($bp){
            $request->session()->flash('success', 'Content Updated successfully');

        }else{
            $request->session()->flash('error', 'Unable to update Content');
        }
        return redirect()->route('content.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }

    public function contactIndex(){
        $contact = Contact::all();
        return view('controls.contact.index',compact('contact'));
    }

    public function destroyContact(Contact $contact, $id)
    {
        //
        $con = $contact->find($id)->delete();

        if($con){
            session()->flash('success', 'Submission Deleted successfully');

        }else{
            session()->flash('error', 'Unable to delete submission');
        }
        return redirect()->route('contact.index');
    }

}
