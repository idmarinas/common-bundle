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

namespace Idm\Bundle\Common\Pattern\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @deprecated since 1.5.0 use "Idm\Bundle\Common\Traits\Entity\IdTrait" instead */
trait IdTrait
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    protected $id;

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
