<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AdminLevel extends Enum
{
    const Superadmin = 1;

    const Admin = 2;

    const Editor = 3;

    const Viewer = 4;
}
