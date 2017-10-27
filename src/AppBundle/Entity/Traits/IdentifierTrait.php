<?php
/**
 * Created by PhpStorm.
 * User: Vitaly Belikov vitalij.bell@gmail.com
 * Date: 26.10.2017
 * Time: 16:58
 */

namespace AppBundle\Entity\Traits;

/**
 * IdentifierTrait
 */
trait IdentifierTrait
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}