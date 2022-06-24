<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\RESTful\ResourceController;
use monken\TablesIgniter;


class Category extends ResourceController
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function datatables()
    {
        $model = $this->category;
        $table = new TablesIgniter();
        $table->setTable($model->noticeTable())
              ->setOutput(["category_id", "category_name", $model->button()]);
        return $table->getDatatable();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('categories/index', [
            'title' => 'Data Kategori',
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
        return view('categories/new', [
            'title' => 'Tambah Data Kategori',
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $this->category->insert([
            'category_name' => $this->request->getPost('category_name'),
        ]);

        return redirect()->to(base_url('category'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        return view('categories/edit', [
            'title' => 'Edit Kategori',
            'category' => $this->category->find($id),
        ]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $this->category->update($id,
        [
            'category_name' => $this->request->getPost('category_name'),
        ]);

        return redirect()->to(base_url('category'))->with('success', 'Data berhasil diedit');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->category->delete($id);
        return redirect()->to(base_url('category'));
    }
}
