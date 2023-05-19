<?php


$conf = new \RdKafka\Conf();

$conf->set('bootstrap.servers', 'pkc-xrnwx.asia-south2.gcp.confluent.cloud:9092');
$conf->set('security.protocol', 'SASL_SSL');
$conf->set('sasl.mechanism', 'PLAIN');
$conf->set('sasl.username', '7UWZWTH543V5LEZF');
$conf->set('sasl.password', '2UcdkvVR5Le4w/Wec/5lQ/yfVwt/fF1ySYSf1ukE3aSFdISgyUxkjoX8uE3BfDro');
$conf->set('group.id', 'group');
$conf->set('auto.offset.reset', 'earliest');

$consumer = new \RdKafka\KafkaConsumer($conf);

$consumer->subscribe(['mytopic1', 'mysecondtopic']);

while (true) {
    $message = $consumer->consume(5000);

    var_dump($message->payload);
}