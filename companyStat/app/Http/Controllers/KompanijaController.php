<?php

namespace App\Http\Controllers;

use App\Http\Resources\KompanijaResurs;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KompanijaController extends BaseController
{
    public function index()
    {
        $kompanija = Company::all();
        return $this->uspesnoOdgovor(KompanijaResurs::collection($kompanija), 'Vraceni svi podaci o kompanijama.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nazivKompanije' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $kompanija = Company::create($input);

        return $this->uspesnoOdgovor(new KompanijaResurs($kompanija), 'Nova kompanija je kreirana.');
    }


    public function show($id)
    {
        $kompanija = Company::find($id);
        if (is_null($kompanija)) {
            return $this->greskaOdgovor('Kompanija sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new KompanijaResurs($kompanija), 'Kompanija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $kompanija = Company::find($id);
        if (is_null($kompanija)) {
            return $this->greskaOdgovor('Kompanija sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'nazivKompanije' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $kompanija->nazivKompanije = $input['nazivKompanije'];
        $kompanija->save();

        return $this->uspesnoOdgovor(new KompanijaResurs($kompanija), 'Kompanija je azurirana.');
    }

    public function destroy($id)
    {
        $kompanija = Company::find($id);
        if (is_null($kompanija)) {
            return $this->greskaOdgovor('Kompanija sa zadatim id-em ne postoji.');
        }
        $kompanija->delete();
        return $this->uspesnoOdgovor([], 'Kompanija je obrisana.');
    }
}
