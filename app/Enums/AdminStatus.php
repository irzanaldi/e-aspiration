<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AdminStatus extends Enum
{
    const Active = 1;

    const Disable = 2;

    const Banned = 3;
}
