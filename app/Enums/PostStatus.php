<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static PUBLISHED()
 * @method static static SCHEDULED()
 * @method static static DRAFT()
 */
final class PostStatus extends Enum
{
    #[Description('badge-light-success')]
    const PUBLISHED = 'Опубликовано';

    #[Description('badge-light-primary')]
    const SCHEDULED = 'Запланировано';

    #[Description('badge-light-warning')]
    const DRAFT = 'Черновик';
}
