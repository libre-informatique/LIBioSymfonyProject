<?php

/*
 * This file is part of the BLAST package <http://blast.libre-informatique.fr>.
 *
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Admin;

use Librinfo\VarietiesBundle\Admin\VarietyAdminConcrete as BaseAdmin;

/**
 * Sonata Admin for varieties
 *
 * @author Marcos Bezerra de Menezes <marcos.bezerra@libre-informatique.fr>
 */
class VarietyAdminConcrete extends BaseAdmin
{
    protected $baseRouteName = 'admin_libio_variety';
    protected $baseRoutePattern = 'librinfo/libio/variety';
}