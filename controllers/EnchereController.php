<?php

namespace App\Controllers;

use App\Models\Encheres;
use App\Models\Timbres;
use App\Models\Images;
use App\Providers\View;
//use App\Providers\Validator;

class ClientController
{


    public function accueil()
    {
        $enchere = new Encheres;

        $encheres = $enchere->select('nom');
        if ($encheres) {
            return View::render('enchere/catalogue', ['encheres' => $encheres]);
        } else {
            echo "error";
        }
    }




    public function index()
    {
        $enchere = new Encheres;
        $encheres = $enchere->select('nom');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');
        

        // $succursale = new Succursales;
        // $succursales = $succursale->select('nom');

        $image = new Images;
        $images = $image->select('image_url');


        if ($encheres) {
            return View::render('enchere/index', ['encheres' => $encheres, 'images' => $images, 'timbres' => $timbres]);
        } else {
            echo "error";
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            // print_r($data);
            // die();
            $timbre = new Timbres;
            $selectId = $timbre->selectId($data['id']);

            $enchere = new Encheres;
            $encheres = $enchere->selectId($data['id_enchere']);

            $image = new Images;
            $images = $image->select('image');

            // $succursale = new Succursales;
            // $succursales = $succursale->select('nom');

            if ($selectId) {
                return View::render('enchere/show', ['timbre' => $selectId, 'encheres' => $encheres, 'images' => $images]);
            } else {
                return View::render('error', ['msg' => 'Could not find this enchere']);
            }
        }
        return View::render('error');
    }

    public function create()
    {
        $enchere = new Encheres;
        $encheres = $enchere->select('nom');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image');

        // $succursale = new Succursales;
        // $succursales = $succursale->select('nom');

        // print_r($encheres);
        // echo "<br><br>";
        // print_r($timbres);
        // echo "<br><br>";
        // print_r($images);
        // echo "<br><br>";
        // print_r($succursales);
        // echo "<br><br>";

        // die();

        return View::render('enchere/create', ['encheres'=> $encheres, 'images' => $images, 'timbres' => $timbres]);
    }


    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $timbre = new Timbres;
            $selectId = $timbre->selectId($data['id']);
            if ($selectId) {
                $enchere = new Encheres;
                $encheres = $enchere->selectId($data['id_enchere']);

                $image = new Images;
                $images = $image->select('image');

                // $succursale = new Succursales;
                // $succursales = $succursale->select('nom');
                //print_r($selectId);
                return View::render('enchere/edit', ['encheres' => $encheres, 'images' => $images, 'inputs' => $selectId]);
            }
        }
        return View::render('error');
    }




    public function store($data)
    {
        // $validator = new Validator;
        // $validator->field('nom', $data['nom'])->min(2)->max(10);
        // // $validator->field('adresse', $data['adresse'])->required();
        // // $validator->field('tel', $data['tel'])->required();
        // // $validator->field('code_postal', $data['code_postal'], 'code_postal')->required();
        // // $validator->field('courriel', $data['courriel'])->required();
        // // $validator->field('city_id', $data['city_id'], 'City')->required()->number();

        // if ($validator->isSuccess()) {
            $enchere = new Encheres;
            $insert = $enchere->insert($data);

            if ($insert) {
                // print_r($data);
                // echo "<br><br>";
                // print_r($insert);
                // die();
                return View::redirect('encheres');
            } else {
                return View::render('error');
            }
        // } 
        // else {
        //     $errors = $validator->getErrors();
        //     // print_r( $errors);
            
        //     $succursale = new Succursales;
        //     $succursales = $succursale->select('nom');

        //     $timbre = new Timbres;
        //     $timbres = $timbre->select('date_timbre');

        //     $image = new Images;
        //     $images = $image->select('image');



        //     return View::render('enchere/create',
        //         ['errors' => $errors, 'inputs' => $data]
        //     );
        // }
    }

    public function delete($data)
    {
        $enchere = new Encheres;
        $delete = $enchere->delete($data['id']);
        
        if ($delete) {
            return View::redirect('encheres');
        }
        return View::render('error');
    }
}
