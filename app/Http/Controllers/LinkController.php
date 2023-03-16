<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Facades\Gate;

class LinkController extends Controller
{
    public function index()
    {
        $links = auth()->user()->links()
                    ->withCount('visits')
                    ->get();

        return view('links.index', [
            'links' => $links
        ]);
    }

    public function create()
    {
        return view('links.create');
    }

    public function store()
    {
        // validation
        $attr = request()->validate([
            'name' => 'required|min:3|max:255',
            'url' => 'required|url'
        ]);
        $attr['user_id'] = auth()->user()->id;

        Link::create($attr);

        return redirect('/links')->with('success', 'Link has been added to your profile');

    }

    public function edit(Link $link)
    {
        return view('links.edit', [
            'link' => $link
        ]);
    }

    public function update(Link $link)
    {
        // validate
        $attr = request()->validate([
            'name' => 'required|min:3|max:255',
            'url' => 'required|url|max:255',
        ]);

        // authorization with Gate
        if(Gate::denies('authorize-action', $link)) {
            return abort(403);
        }

        $link->update($attr);

        return redirect()->route('links.index')->with('success', 'Link has been updated');
    }

    public function destory(Link $link)
    {
        // authorization with Gate
        if(Gate::denies('authorize-action', $link)) {
            return abort(403);
        }

        $link->delete();

        return redirect()->route('links.index')->with('success', 'Link has been removed');
    }

}
