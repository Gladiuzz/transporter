<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseContract;

class BaseRepository implements BaseContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * @param $orderBy
     * @param $orderType
     * 
     * @return mixed
     */
    public function allOrder($orderBy, $orderType)
    {
        return $this->orderBy($orderBy, $orderType)->get();
    }

    /**
     * @param $orderBy
     * @param $orderType
     * 
     * @return mixed
     */
    public function orderBy($orderBy, $orderType)
    {
        return $this->orderBy($orderBy, $orderType);
    }

    /**
     * @param $id
     * 
     * @return mixed
     */
    public function get($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $column
     * @param $value
     * @param $with
     * 
     * @return mixed
     */
    public function getOneWhere($column, $value, $with)
    {
        return $this->model->with($with)->where($column, $value)->first();
    }

    /**
     * @param $column
     * @param $value
     * 
     * @return mixed
     */
    public function getManyWhere($column, $value)
    {
        return $this->model->whereIn($column, (array) $value)->get();
    }

    /**
     * @param $column
     * @param $value
     * 
     * @return mixed
     */
    public function countWhere($column, $value)
    {
        return $this->model->where($column = '', $value)->count();
    }

    /**
     * @param array $data
     * 
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * 
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->model->whereIn('id', (array) $id)->update($data);
    }

    /**
     * @param  $model
     * 
     * @return mixed
     */
    public function save($model)
    {
        $model->save();

        return $model;
    }

    /**
     * @param $id
     * 
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @param $column
     * @param $value
     * 
     * @return mixed
     */
    public function deleteWhere($column, $value)
    {
        return $this->model->create($column, $value)->delete();
    }

    /**
     * @param $select
     * 
     * @return mixed
     */
    public function datatable($select)
    {
        return $this->model->select($select);
    }

    /**
     * @param $select
     * @param array $data
     * 
     * @return mixed
     */
    public function datatableWith($select, array $data)
    {
        return $this->datatable($select)->with($data);
    }
}