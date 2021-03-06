<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\RESTful\ResourceController;

class Item extends ResourceController
{
    protected $item;
    protected $category;

    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => []
    ];

    public function __construct()
    {
        $this->item = new \App\Models\Item();
        $this->category = new CategoryModel();
    }

    public function datatables()
    {
        $item = $this->item;
        $where = ['item_id !=' => 0];
        $column_order   = ['', 'name', 'category_id'];
        $column_search  = ['name'];
        $order = array('name' => 'ASC');
        $lists = $item->get_datatables('items', $column_order, $column_search, $order, $where);
        $data = [];
        $no = $_GET['start'];
        foreach ($lists as $list) {
            $no++;
            $row    = [];
            $row[]    = '<input type="checkbox" name="checkbox[]" class="checkbox" value="' . $list->item_id . '">';
            $row[]  = $no;
            $row[]  = $list->name;
            $row[]  = $list->category_name;
            $row[]  = "
                <a onclick='edit()' class='btn btn-sm btn-primary'><i class='fa fa-pencil-alt'></i></a>
                <a class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>
            ";

            $data[] = $row;
        }

        $output = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $item->count_all('items', $where),
            "recordsFiltered" => $item->count_filtered('items', $column_order, $column_search, $order, $where),
            "data" => $data,
        ];

        return json_encode($output);

    }

    public function index()
    {
        return view('items/index', [
            'title' => 'Item Index',
            'categories' => $this->category->findAll(),
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
        // dd($this->request->isAJAX());
        if (!$this->request->isAJAX()) {
            $data = [
                'name' => $this->request->getVar('name'),
                'category_id'    => $this->request->getVar('category_id')
            ];

            $simpan = $this->item->insert($data);
            if ($simpan) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
            }

            return json_encode($this->output);
        }
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

    public function multipleForm()
    {
        if ($this->request->isAJAX()) {
            $message = [
                'data' => view('items/form-multiple', [
                    'categories' => $this->category->findAll()
                ])
            ];
        }
        echo json_encode($message);
    }

    public function multipleSave()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate([
                'name' => 'required',
                'category_id' => 'required',
            ]))
            {
                $name = $this->request->getPost('name');
                $category_id = $this->request->getPost('category_id');
    
                $total = count($name);
                for ($i = 0; $i < $total; $i++) {
                    $this->item->insert([
                        'name' => $name[$i],
                        'category_id' => $category_id[$i],
                    ]);
                }
    
                $message = [
                    'success' => $total . ' Data berhasil disimpan'
                ];
    
                return json_encode($message);
            }
        }
    }

    public function deleteAll()
    {
        if ($this->request->isAJAX()) {
            $item_id = $this->request->getPost('checkbox');

            $total = count($item_id);
            for ($i=0; $i < $total; $i++) { 
                $this->item->delete($item_id[$i]);
            }

            $message = [
                'success' => "$total Data berhasil dihapus"
            ];

            echo json_encode($message);
        }
    }
}
