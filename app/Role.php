<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    const MODERATOR_ROLE = 1;
    const EMPLOYER_ROLE = 2;
}