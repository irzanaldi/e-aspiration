<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LevelStatus extends Enum
{
    const Basic = 1;

    const Green = 2;

    const Vip = 3;

    const Priority = 4;
}
