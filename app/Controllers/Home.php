<?php

namespace App\Controllers;

use App\Models\Product_m;
use Config\Database;

class Home extends BaseController
{
    public function __construct()
    {
        helper('movie');
        $this->product_m = new Product_m();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $product = $this->product_m->getProduct();
        $getDetailDb = [];
        foreach ($product as $p) {
            $detailprod = $this->product_m->getDetailDb($p['id']);
            if (isset($p['id'])) {
                $detailprod = $this->product_m->getDetailDb($p['id']);
                if ($detailprod !== null) {
                    $getDetailDb[$p['id']] = $detailprod;
                }
            }
        }
        $data['product'] = $product;
        $data['getDetailDb'] = $getDetailDb;
        return view('intro_v', $data);
    }

    public function search()
    {
        $searchTerm = $this->request->getVar('search');
        $searchTerm = urldecode($searchTerm);
        $product = $this->product_m->searchProduct($searchTerm);
        $getDetailDb = [];
        foreach ($product as $p) {
            $detailprod = $this->product_m->getDetailDb($p['id']);
            if (isset($p['id'])) {
                $detailprod = $this->product_m->getDetailDb($p['id']);
                if ($detailprod !== null) {
                    $getDetailDb[$p['id']] = $detailprod;
                }
            }
        }

        $data['product'] = $product;
        $data['getDetailDb'] = $getDetailDb;
        return view('intro_v', $data);
    }

    public function details($id)
    {
        $data['getDetails'] = $this->product_m->getDetails($id);
        $data['getOverviewDb'] = $this->product_m->getDetailDb($id);

        return view('details_v', $data);
    }

    public function update()
    {
        $product_id = $this->request->getPost('product_id');
        $overview = $this->request->getPost('overview');

        $checkMovieDb = $this->product_m->getDetailDb($product_id);
        if ($checkMovieDb == null) {
            $this->product_m->saveOverview($product_id, $overview);
        } else {
            $this->product_m->updateOverview($product_id, $overview);
        }

        return redirect()->to('details/' . $product_id);
    }
}
