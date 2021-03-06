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

namespace Tests\CdekSDK\Deserialization;

use CdekSDK\Common\Pvz;
use CdekSDK\Responses\PvzListResponse;
use Tests\CdekSDK\Fixtures\FixtureLoader;

/**
 * @covers \CdekSDK\Responses\PvzListResponse
 * @covers \CdekSDK\Common\Pvz
 * @covers \CdekSDK\Common\OfficeImage
 */
class PvzListResponseTest extends TestCase
{
    public function test_empty_response()
    {
        $response = $this->getSerializer()->deserialize(FixtureLoader::load('PvzListEmpty.xml'), PvzListResponse::class, 'xml');

        /** @var $response PvzListResponse */
        $this->assertInstanceOf(PvzListResponse::class, $response);
        $this->assertEmpty($response->getItems());
    }

    public function test_common_response()
    {
        $response = $this->getSerializer()->deserialize(FixtureLoader::load('PvzList.xml'), PvzListResponse::class, 'xml');

        /** @var $response PvzListResponse */
        $this->assertInstanceOf(PvzListResponse::class, $response);
        $this->assertNotEmpty($response->getItems());
        $this->assertCount(3, $response->getItems());
        $this->assertCount(3, $response);

        foreach ($response as $item) {
            $this->assertInstanceOf(Pvz::class, $item);
        }

        $item = $response->getItems()[0];
        $this->assertInstanceOf(Pvz::class, $item);

        $this->assertAttributeInternalType('boolean', 'HaveCashless', $item);
        $this->assertTrue($item->HaveCashless);

        /** @var $item Pvz */
        $this->assertSame('EKB8', $item->Code);

        $item = $response->getItems()[2];
        $this->assertCount(1, $item->OfficeImages);
        $this->assertStringStartsWith('http', $item->OfficeImages[0]->getUrl());
    }

    public function test_new_true_false()
    {
        $response = $this->getSerializer()->deserialize(FixtureLoader::load('PvzListFalseTrue.xml'), PvzListResponse::class, 'xml');

        /** @var $response PvzListResponse */
        $this->assertInstanceOf(PvzListResponse::class, $response);
        /** @var $response PvzListResponse */
        $this->assertInstanceOf(PvzListResponse::class, $response);
        $this->assertNotEmpty($response->getItems());
        $this->assertCount(1, $response->getItems());
        $this->assertCount(1, $response);

        $item = $response->getItems()[0];
        $this->assertInstanceOf(Pvz::class, $item);

        $this->assertAttributeInternalType('boolean', 'HaveCashless', $item);
        $this->assertTrue($item->HaveCashless);
    }

    public function test_it_has_no_errors()
    {
        $response = new PvzListResponse();
        $this->assertFalse($response->hasErrors());
        $this->assertCount(0, $response->getMessages());
    }

    public function test_it_serializes_to_empty_json()
    {
        $response = new PvzListResponse();
        $this->assertSame([], $response->jsonSerialize());
    }
}
