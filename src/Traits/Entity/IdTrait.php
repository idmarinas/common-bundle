<?php
/**
 * Copyright 2023-2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/11/24, 20:34
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IdTrait.php
 * @date    13/04/2023
 * @time    16:35
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

namespace Idm\Bundle\Common\Traits\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER, options: ['unsigned' => true])]
    protected int $id;

    public function getId (): ?int
    {
        return $this->id;
    }

    public function setId (?int $id): static
    {
        $this->id = $id;

        return $this;
    }
}
