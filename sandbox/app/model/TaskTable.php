<?php

namespace Todo;
use Nette;

/**
 * Model starající se o tabulku task
 */
class TaskTable extends Table
{
    /** @var string */
    protected $tableName = 'task';
    
    public function findIncomplete()
    {
        return $this->findBy(array('done' => false))->order('created ASC');
    }
}