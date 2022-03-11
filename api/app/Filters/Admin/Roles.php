<?php

namespace App\Filters\Admin;

use App\Filters\DataTransferObject;

/**
 * Class RolesFilter
 * 
 * @package App\Filters\Admin
 */
class RolesFilter extends DataTransferObject
{
    /**
     * @var string
     */
    public $label;
    /**
     * @var int
     */
    public $id;
}
