<?php

/**
 * This file is part of Cdek SDK package.
 *
 * © Appwilio (http://appwilio.com), greabock (https://github.com/greabock), JhaoDa (https://github.com/jhaoda)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Appwilio\CdekSDK\Responses;

use Appwilio\CdekSDK\Common\Pvz;
use JMS\Serializer\Annotation as JMS;

/**
 * Class PvzList
 *
 * @package Appwilio\CdekSDK\Responses\PvzList
 */
class PvzListResponse
{
    /**
     * @JMS\XmlList(entry="Pvz", inline=true)
     * @JMS\Type("array<Appwilio\CdekSDK\Common\Pvz>")
     *
     * @var Pvz[];
     */
    public $pvzs = [];
}
