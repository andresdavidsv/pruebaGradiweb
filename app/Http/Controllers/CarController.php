<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\models\Owner;
use App\Http\Requests\SaveCarRequest;
use App\Sortable;
use App\CarFilter;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, CarFilter $filters, Sortable $sortable)
    {
        $cars = Car::query()
            ->filterBy($filters, $request->only(['search', 'from', 'to', 'order']))
            ->orderBy('id')
            ->paginate();

        $cars->appends($filters->valid());

        $sortable->appends($filters->valid());

        return view('partial.car.index', [
            'view' => 'index',
            'cars' => $cars,
            'title' => 'Listado de Vehiculos',
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
        return view('partial.car.create',[
            'car' => new Car()
        ])->with($this->formsData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(SaveCarRequest $request)
    {
        $request->createCar($request);
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view ('partial.car.show',[
            'car'=> $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view ('partial.car.edit',[
            'car'=> $car
        ])->with($this->formsData());
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveCarRequest $request,Car $car)
    {
        $request->updateCar($car,$request);

        return redirect()->route('cars.show', $car);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function trashed(Request $request, CarFilter $filters, Sortable $sortable)
    {
        $cars = Car::onlyTrashed()
            ->filterBy($filters, $request->only(['search','from', 'to', 'order']))
            ->orderBy('id')
            ->paginate();

        $cars->appends($filters->valid());

        $sortable->appends($filters->valid());

        return view('partial.car.index', [
            'view' => 'trash',
            'cars' => $cars,
            'title' => 'Listado de Vehiculos en Papelera',
            'sortable' => $sortable,
        ])->with($this->formsData());
    }

    public function trash(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function restore($id)
    {
        $car = Car::onlyTrashed()->where('id',$id)->firstOrFail();

        $car->restore();

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::onlyTrashed()->where('id',$id)->firstOrFail();

        $car->forceDelete();

        return redirect()->route('cars.trashed');
    }

    protected function formsData ()
    {
        return [
        'owner_id' => Owner::orderBy('name')->get(),
        ];
    }
}
