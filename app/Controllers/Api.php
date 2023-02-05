<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class API extends ResourceController
{
    use ResponseTrait;

    function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
        var_dump('Welcome To API Reseller Voucher');
        die();
    }

    public function products()
    {
        // $data = $this->db->query("SELECT * FROM products as a JOIN product_categories as b ON a.categories_id = b.id")->getResultArray();
        $data =  $this->db->table('products')->get()->getResultArray();

        if (!$data) {
            return $this->failNotFound('Data product tidak ditemukan');
        } else {
            return $this->respond(([
                'status' => true,
                'data' => $data
            ]));
        }
    }
  
}
