<?php

namespace App\Http\Requests;

use App\models\Owner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SaveOwnerRequest extends FormRequest
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
            'doc_id'=>['required','numeric','min:1',
                                Rule::unique('owners')
                                ->ignore($this->owner)],

            'name' => 'required',
            'last_name' => 'required',

            // Datos de Contacto
            'phone'=>'required|digits:10|numeric',

            // Imagen de Perfil Conductor

            'avatarOwner' =>'image'
            // |dimensions:max_widht=200'

        ];
    }

    public function createOwner(SaveOwnerRequest $request)
    {
        DB::transaction(function () use($request) {
            $owner = Owner::create($this->validated());
            //Multimedias

        if ($request->hasFile('avatarOwner')){
            $owner->avatarOwner = $request->file('avatarOwner')
                    ->storeAs("pictures/owners/".$owner->id, 'FotoPerfilPropietario.jpg','public');
        $owner->save();
        }

        $owner->save();
        });
    }

    public function updateOwner(Owner $owner, SaveOwnerRequest $request)
    {
        DB::transaction(function () use($owner,$request) {

            $data = $this->validated();

            //Multimedias

            if ($request->hasFile('avatarOwner')){
            $owner->avatarOwner = $request->file('avatarOwner')
                    ->storeAs("pictures/owners/".$owner->id, 'FotoPerfilPropietario.jpg','public');
                    $owner->save();
            }

            $owner->save();

        });
    }

}
