<?php

use Leandro47\ConverterResponse\Converter;
use Leandro47\ConverterResponse\Format\Json;
use Leandro47\ConverterResponse\Format\Xml;

require_once './vendor/autoload.php';

$json = file_get_contents('https://economia.awesomeapi.com.br/json/last/USD-BRL');
$xml = file_get_contents('https://economia.awesomeapi.com.br/xml/last/USD-BRL');

$converter =  new Converter($json);
$object = $converter->from(new Json)->to(new Xml)->get();

echo $object;
