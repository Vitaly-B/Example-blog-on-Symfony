<?php
/**
 * Created by PhpStorm.
 * User: Vitaly Belikov vitalij.bell@gmail.com
 * Date: 26.10.2017
 * Time: 16:53
 */

namespace AppBundle\Entity\Interfaces;

/**
 * TimestampableInterface
 */
interface TimestampableInterface
{
    /**
     * Returns createdAt value.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime;

    /**
     * Returns updatedAt value.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime;

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Updates createdAt and updatedAt timestamps.
     * @return void
     */
    public function updateTimestamps(): void;
}