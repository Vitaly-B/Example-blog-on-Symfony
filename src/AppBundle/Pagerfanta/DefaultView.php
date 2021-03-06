<?php
/**
 * Created by PhpStorm.
 * User: Vitaly Belikov vitalij.bell@gmail.com
 * Date: 26.10.2017
 * Time: 20:35
 */

namespace AppBundle\Pagerfanta;

use Pagerfanta\View\DefaultView as BaseDefaultView;

/**
 *
 * DefaultView
 */
class DefaultView extends BaseDefaultView
{
    protected function createDefaultTemplate()
    {
        return new DefaultTemplate();
    }

    protected function getDefaultProximity()
    {
        return 3;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app_pagerfanta_template_default';
    }
}