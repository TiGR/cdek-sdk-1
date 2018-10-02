<?php
/**
 * This code is licensed under the MIT License.
 *
 * Copyright (c) 2018 Appwilio (http://appwilio.com), greabock (https://github.com/greabock), JhaoDa (https://github.com/jhaoda)
 * Copyright (c) 2018 Alexey Kopytko <alexey@kopytko.com> and contributors
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

declare(strict_types=1);

namespace CdekSDK\Common;

use JMS\Serializer\Annotation as JMS;

/**
 * Вложение (товар).
 *
 * Пример данных:
 *
 * <Item WareKey="Ботинки60, размер 40" Comment="Кроссовки мужские" Cost="832" Payment="832" VATRate="VAT18" VATSum="126.92" Weight="0.560" Amount="1" DelivAmount="0" />
 */
final class Item
{
    use Fillable;

    /**
     * Идентификатор/артикул товара/вложения (Уникален в пределах упаковки Package).
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("WareKey")
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $WareKey;

    /**
     * Объявленная стоимость товара (за единицу товара в указанной валюте, значение >=0). С данного значения рассчитывается страховка.
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Cost")
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $Cost;

    /**
     * Оплата за товар при получении (за единицу товара в указанной валюте, значение >=0) — наложенный платеж, в случае предоплаты значение = 0.
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Payment")
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $Payment;

    /**
     * Ставка НДС включенная в стоимость товара.
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("VATRate")
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $VATRate;

    /**
     * Сумма НДС, включенного в стоимость товара.
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("VATSum")
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $VATSum;

    /**
     * Вес (за единицу товара, в граммах).
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Weight")
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $Weight;

    /**
     * Количество единиц одноименного товара (в штуках).
     *
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Amount")
     * @JMS\Type("int")
     *
     * @var int
     */
    protected $Amount;

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("Comment")
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $Comment;

    /**
     * @JMS\XmlAttribute
     * @JMS\SerializedName("DelivAmount")
     * @JMS\Type("float")
     *
     * @var float
     */
    protected $DelivAmount;

    /**
     * @phan-suppress PhanUnusedPublicFinalMethodParameter
     *
     * @deprecated
     * @codeCoverageIgnore
     *
     * @return \CdekSDK\Common\Item
     */
    public static function create(string $WareKey, float $Cost, float $Payment, int $Weight, int $Amount, string $Comment)
    {
        return new static(compact('WareKey', 'Cost', 'Payment', 'Weight', 'Amount', 'Comment'));
    }

    public function getWareKey(): string
    {
        return $this->WareKey;
    }

    public function getCost(): float
    {
        return $this->Cost;
    }

    public function getPayment(): float
    {
        return $this->Payment;
    }

    public function getVATRate(): string
    {
        return $this->VATRate;
    }

    public function getVATSum(): float
    {
        return $this->VATSum;
    }

    public function getWeight(): float
    {
        return $this->Weight;
    }

    public function getAmount(): int
    {
        return $this->Amount;
    }

    public function getComment(): string
    {
        return $this->Comment;
    }

    public function getDelivAmount(): float
    {
        return $this->DelivAmount;
    }
}
