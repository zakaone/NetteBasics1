<?php

namespace Todo;
use Nette;

/**
 * Model starající se o tabulku tasklist
 */
class TaskListTable extends  Table
{
    /** @var string */
    protected $tableName = 'tasklist';
}