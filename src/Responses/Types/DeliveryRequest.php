<?php
/*
 * This file is part of Cdek SDK package.
 *
 * © Appwilio (http://appwilio.com), greabock (https://github.com/greabock), JhaoDa (https://github.com/jhaoda)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Appwilio\CdekSDK\Responses\Types;

use Appwilio\CdekSDK\Contracts\HasMessage;
use JMS\Serializer\Annotation as JMS;

/**
 * DeliveryRequest - эхо из ответа на ошибочный DeliveryRequest.
 *
 * Пример данных:
 *
 * <DeliveryRequest Number="" ErrorCode="ERR_NEED_ATTRIBUTE" Msg="Не задано значение атрибута:NUMBER"/>
 */
final class DeliveryRequest implements HasMessage
{
    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Number")
     * @JMS\Type("string")
     *
     * @var string
     */
    private $Number;

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("ErrorCode")
     * @JMS\Type("string")
     *
     * @var string
     */
    private $ErrorCode;

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Msg")
     * @JMS\Type("string")
     *
     * @var string
     */
    private $Msg;

    public function getNumber(): string
    {
        return (string) $this->Number;
    }

    public function getErrorCode(): string
    {
        return (string) $this->ErrorCode;
    }

    public function getMessage(): string
    {
        return (string) $this->Msg;
    }
}