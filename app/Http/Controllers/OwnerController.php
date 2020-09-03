<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Car;
use Illuminate\Http\Request;

use App\Http\Requests\SaveOwnerRequest;
use App\OwnerFilter;
use App\Sortable;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, OwnerFilter $filters, Sortable $sortable)
    {
        $owners = Owner::query()
            ->filterBy($filters, $request->only(['search', 'from', 'to', 'order']))
            ->orderBy('id')
            ->paginate();

        $owners->appends($filters->valid());

        $sortable->appends($filters->valid());

        return view('partial.owner.index', [
            'view' => 'index',
            'owners' => $owners,
            'title' => 'Listado de Propietarios',
            'sortable' => $sortable,

        ])->with($this->formsData());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partial.owner.create',[
            'owner' => new Owner
        ])->with($this->formsData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(SaveOwnerRequest $request)
    {
        $request->createOwner($request);
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Owner $owner)
    {
        return view ('partial.owner.show',[
            'owner'=> $owner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Owner $owner)
    {
        return view ('partial.owner.edit',[
            'owner'=> $owner
        ])->with($this->formsData());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(SaveOwnerRequest $request,Owner $owner)
    {
        $request->updateOwner($owner,$request);
        return redirect()->route('owners.show', $owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function trashed(Request $request, OwnerFilter $filters, Sortable $sortable)
    {
        $owners = Owner::onlyTrashed()
            ->filterBy($filters, $request->only(['search','from', 'to', 'order']))
            ->orderBy('id')
            ->paginate();

        $owners->appends($filters->valid());

        $sortable->appends($filters->valid());

        return view('partial.owner.index', [
            'view' => 'trash',
            'owners' => $owners,
            'title' => 'Listado de Propietarios en Papelera',
            'sortable' => $sortable,
        ])->with($this->formsData());
    }

    public function trash(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }

    public function restore($id)
    {
        $owner = Owner::onlyTrashed()->where('id',$id)->firstOrFail();

        $owner->restore();

        return redirect()->route('owners.index');
    }

    public function destroy($id)
    {
        $owner = Owner::onlyTrashed()->where('id',$id)->firstOrFail();

        $owner->forceDelete();

        return redirect()->route('owners.trashed');
    }

    protected function formsData ()
    {
        return [

        ];
    }
}
