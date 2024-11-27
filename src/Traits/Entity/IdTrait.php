<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 1.0.0
 */

namespace Idm\Bundle\Common\Traits\Entity;

use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    protected int $id;

    public function setId(?int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
