<?php
/**
 * Created by PhpStorm.
 * User: Vitaly Belikov vitalij.bell@gmail.com
 * Date: 26.10.2017
 * Time: 16:48
 */

namespace AppBundle\Entity\Interfaces;


interface PostInterface extends IdentifierInterface
{
    /**
     * @param string|null $title
     *
     * @return PostInterface
     */
    public function setTitle(?string $title): PostInterface;

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * Set description
     *
     * @param string|null $description
     *
     * @return PostInterface
     */
    public function setDescription(?string $description): PostInterface;

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Set text
     *
     * @param string|null $text
     *
     * @return PostInterface
     */
    public function setText(?string $text): PostInterface;

    /**
     * Get text
     *
     * @return string|null
     */
    public function getText(): ?string;
}