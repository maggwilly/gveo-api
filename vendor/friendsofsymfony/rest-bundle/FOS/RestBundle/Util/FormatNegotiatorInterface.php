<?php

/*
 * This file is part of the FOSRestBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\RestBundle\Util;

use Symfony\Component\HttpFoundation\Request;

/**
 * @deprecated since 1.8, to be removed in 2.0.
 */
interface FormatNegotiatorInterface
{
    /**
     * Gets the best format.
     *
     * @param Request $request
     *
     * @return null|string
     */
    public function getBestFormat(Request $request);
}
