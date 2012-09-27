<?php

namespace Todo;
use Nette;

/**
 * Model starající se o tabulku user
 */
class UserTable extends Table
{
    /** @var string */
    protected $tableName = 'user';
}