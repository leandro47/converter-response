<?php

use Leandro47\ConverterResponse\Converter;
use Leandro47\ConverterResponse\Format\Json;
use Leandro47\ConverterResponse\Format\Xml;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    private string $mockXml;
    private string $mockJson;

    public function setUp(): void
    {
        parent::setUp();

        $this->mockXml = '<?xml version="1.0"?><root><USDBRL><code>USD</code><codein>BRL</codein><name>D&#xF3;lar Americano/Real Brasileiro</name><high>4.9076</high><low>4.9019</low><varBid>-0.0044</varBid><pctChange>-0.09</pctChange><bid>4.9007</bid><ask>4.9031</ask><timestamp>1654859998</timestamp><create_date>2022-06-10 08:19:58</create_date></USDBRL></root>';

        $this->mockJson = '{"USDBRL":{"code":"USD","codein":"BRL","name":"D\u00f3lar Americano\/Real Brasileiro","high":"4.9076","low":"4.9019","varBid":"-0.0044","pctChange":"-0.09","bid":"4.9007","ask":"4.9031","timestamp":"1654859998","create_date":"2022-06-10 08:19:58"}}';
    }

    public function testInstanceClassDecodeFromXml()
    {
        $converter = new Converter($this->mockXml);
        $objectXml = $converter->from(new Xml());

        static::assertInstanceOf(Converter::class, $objectXml);
    }

    public function testShouldConvertXmlToJson()
    {
        $converter = new Converter($this->mockXml);
        $objectFromXml = $converter->from(new Xml());
        $objectToJson = $converter->to(New Json());

        static::assertNotEmpty($objectFromXml);
        static::assertNotEmpty($objectToJson);
        static::assertEquals($this->mockJson, $objectToJson->get());
    }

    public function testShouldConvertJsonToXml() {
        $converter = new Converter($this->mockJson);
        $objectFromJson = $converter->from(new Json());
        $objectToXml = $converter->to(New Xml());

        static::assertNotEmpty($objectFromJson);
        static::assertNotEmpty($objectToXml);
        static::assertEquals($this->mockXml, str_replace(["\r\n", "\r", "\n"], '', $objectToXml->get()));
    }
}
