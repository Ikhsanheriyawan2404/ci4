<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
// use App\Models\Item;

class Item extends ResourceController
{
    protected $item;
    protected $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
        $this->item = new \App\Models\Item();
    }

    public function datatables()
    {
        $item = $this->item;
        $where = ['item_id !=' => 0];
        $column_order   = array('', 'name', 'category_id');
        $column_search  = array('name');
        $order = array('name' => 'ASC');
        $lists = $item->get_datatables('items', $column_order, $column_search, $order, $where);
        $data = [];
        $no = $_GET['start'];
        foreach ($lists as $list) {
            $no++;
            $row    = array();
            $row[]  = $no;
            $row[]  = $list->name;
            $row[]  = $list->category_id;
            $row[]  = "
                <button class='btn btn-primary'><i class='fa fa-pencil'></i></button>
                <button class='btn btn-danger'><i class='fa fa-trash'></i></button>
            ";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $item->count_all('items', $where),
            "recordsFiltered" => $item->count_filtered('items', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        echo json_encode($output);

    }

    public function index()
    {
        return view('items/index', [
            'title' => 'Item Index',
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
