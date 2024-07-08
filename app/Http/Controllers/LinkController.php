<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index(){
        $user = Auth::user();

        if($user->role == 'admin'){
            $links = Link::orderBy('id','desc')->paginate(10);
        }else{
            $links = Link::where('iduser', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        }


        return view('links.index', compact('links'));
    }

    public function create(){
        return view('links.create');
    }

    public function store(StoreLinkRequest $request)
    {
        $link = Link::create($request->all());

        return redirect()->route('links.index');
    }

    public function show(Link $link){
        return view('links.show',compact('link'));
    }

    public function edit(Link $link){
        return view('links.edit',compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'url' => "required",
            'category' => 'required',
        ]);
        $link->update($request->all());

        return redirect()->route('links.show',$link);
    }

    public function destroy(Link $link){

        $link->delete();

        return redirect()->route('links.index');
    }    //
}
