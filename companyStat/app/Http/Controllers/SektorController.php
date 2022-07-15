<?php

namespace App\Http\Controllers;

use App\Http\Resources\SektorResurs;
use App\Models\Sektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorController extends BaseController
{
    public function index()
    {
        $sektori = Sektor::all();
        return $this->uspesnoOdgovor(SektorResurs::collection($sektori), 'Vraceni svi podaci o sektorima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivSektora' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $sektor = Sektor::create($input);

        return $this->uspesnoOdgovor(new SektorResurs($sektor), 'Novi sektor je kreiran.');
    }


    public function show($id)
    {
        $sektor = Sektor::find($id);
        if (is_null($sektor)) {
            return $this->greskaOdgovor('Sektor sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new SektorResurs($sektor), 'Sektor sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $tim = Sektor::find($id);
        if (is_null($sektor)) {
            return $this->greskaOdgovor('Sektor sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivSektora' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $sektor->nazivSektora = $input['nazivSektora'];
        $sektor->save();

        return $this->uspesnoOdgovor(new SektorResurs($sektor), 'Sektor je azuriran.');
    }

    public function destroy($id)
    {
        $sektor = Sektor::find($id);
        if (is_null($tim)) {
            return $this->greskaOdgovor('Sektor sa zadatim id-em ne postoji.');
        }

        $sektor->delete();
        return $this->uspesnoOdgovor([], 'Sektor je obrisan.');
    }
}
