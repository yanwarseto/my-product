<?php

namespace App\Models;

use CodeIgniter\Model;

class Product_m extends Model
{
    protected $table = 'PRODUCT.DATA_PRODUCT';
    protected $column_order = ['ID', 'DETAIL_PROD'];

    protected $api_url = 'https://dummyjson.com/products'; // Base URL API
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getProduct()
    {
        $url = $this->api_url . "?limit=12&sortBy=title&order=asc";
        $response = $this->fetchData($url);

        return $response ? $response['products'] : [];
    }

    public function searchProduct($query)
    {
        $query = urlencode($query);

        $url = $this->api_url . "/search?q={$query}";
        $response = $this->fetchData($url);

        return $response ? $response['products'] : [];
    }

    public function getDetails($id)
    {
        $url = $this->api_url . "/{$id}";
        $response = $this->fetchData($url);

        if ($response) {
            return $response;
        } else {
            return [];
        }
    }

    private function fetchData($url)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function getDetailDb($id)
    {
        $builder = $this->db->table('PRODUCT.DATA_PRODUCT');
        $builder->select('DETAIL_PROD');
        $builder->where('ID', $id);
        $query = $builder->get();
        $result = $query->getRowArray();
        return $result ? $result['DETAIL_PROD'] : null;
    }

    public function saveOverview($product_id, $overview)
    {
        $builder = $this->db->table('PRODUCT.DATA_PRODUCT');

        $data = [
            'ID' => $product_id,
            'DETAIL_PROD' => $overview
        ];

        $builder->insert($data);
        return true;
    }

    public function updateOverview($product_id, $overview)
    {
        $builder = $this->db->table('PRODUCT.DATA_PRODUCT');

        $data = [
            'DETAIL_PROD' => $overview
        ];

        $builder->where('ID', $product_id);
        $builder->update($data);
        return true;
    }
}
