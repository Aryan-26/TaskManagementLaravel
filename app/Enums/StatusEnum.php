<?php

namespace App\Enums;

use App\Traits\OptionsTrait;

enum StatusEnum: string
{

    case PANDING  = 'pending	';
    case In_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
}
