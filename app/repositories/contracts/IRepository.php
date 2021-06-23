<?php

namespace FJR\repositories\contracts;

interface IRepository
{
    /** Get all data
     * @param array $columns
     * @return mixed
     */
    public function getAll($columns = array('*'));

    /** Get a record by id
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Get a record by any column 
     * @param array $columnsData
     * @return mixed
     */
    public function where(array $columnData);
}
