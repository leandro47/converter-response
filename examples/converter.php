<?php

use Leandro47\ConverterResponse\Converter;
use Leandro47\ConverterResponse\Format\Json;
use Leandro47\ConverterResponse\Format\Xml;

require_once './vendor/autoload.php';

$json = "
{
    'value': 'value1',
    'value2': 'value2',
    'value3': {
        'subvalue': 'subvalue'
    }
}";

$xml = "
<?xml version='1.0' encoding='UTF-8' ?>
<root>
  <value>value1</value>
  <value2>value2</value2>
  <value3>
    <subvalue>subvalue</subvalue>
  </value3>
</root>
";

$converter =  new Converter($json);
$object = $converter->from(new Json)->to(new Json)->get();

echo $object;
