<?php

namespace App\Http\Requests;

use App\models\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SaveCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Datos Generales
            'plate'=>['required','min:6',
                                Rule::unique('cars')
                                ->ignore($this->car)],
            'car_brand' => 'required',
            'car_config' => 'required',
            'owner_id' => ['required',Rule::exists('owners','id')],

            // Imagen de Perfil Conductor

            'avatarCar' =>'image'
            // 'avatarCar' =>'image|dimensions:max_widht=200'
        ];
    }

    public function createCar(SaveCarRequest $request)
    {
        DB::transaction(function () use($request) {
            $car = Car::create($this->validated());
            //Multimedias

            if ($request->hasFile('avatarCar')){
                $car->avatarCar = $request->file('avatarCar')
                        ->storeAs("pictures/cars/".$car->plate, 'PictureCar.jpg','public');
            $car->save();
            }

            $car->save();
        });
    }

    public function updateCar(Car $car,SaveCarRequest $request)
    {
        DB::transaction(function () use($car,$request) {

            $data = $this->validated();

            $car->fill($data);
            $car->save();


            //Multimedias

            if ($request->hasFile('avatarCar')){
                $car->avatarCar = $request->file('avatarCar')
                        ->storeAs("pictures/cars/".$car->plate, 'PictureCar.jpg','public');
            $car->save();
            }
            $car->save();

        });
    }

}
