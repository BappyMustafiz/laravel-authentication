<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerQuery\Store;
use App\Http\Requests\CustomerQuery\Update;
use App\Models\CustomerQuery;
use Illuminate\Http\Request;

class CustomerQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = CustomerQuery::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('frontend.pages.queries.index', compact('queries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.queries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $customerQuery = new CustomerQuery();
        $customerQuery->title = $request->title;
        $customerQuery->content = $request->content;
        $customerQuery->save();

        session()->flash('success', 'New Query has been created successfully !!');
        return redirect()->route('queries.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerQuery = CustomerQuery::find($id);
        if (is_null($customerQuery)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('queries.index');
        }
        return view('frontend.pages.queries.edit', compact('customerQuery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $customerQuery = CustomerQuery::find($id);
        if (is_null($customerQuery)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('queries.index');
        }

        $customerQuery->title = $request->title;
        $customerQuery->content = $request->content;
        $customerQuery->save();
        session()->flash('success', 'Query has been updated successfully !!');
        return redirect()->route('queries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerQuery = CustomerQuery::find($id);
        if (is_null($customerQuery)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('queries.index');
        }

        $customerQuery->delete();

        session()->flash('success', 'Query has been deleted successfully as trashed !!');
        return redirect()->route('queries.index');
    }
}
