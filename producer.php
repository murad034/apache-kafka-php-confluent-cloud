<?php


$conf = new \RdKafka\Conf();

$conf->set('bootstrap.servers', 'localhost:9092');
//$conf->set('bootstrap.servers', 'pkc-xrnwx.asia-south2.gcp.confluent.cloud:9092');
//$conf->set('security.protocol', 'SASL_SSL');
//$conf->set('sasl.mechanism', 'PLAIN');
//$conf->set('sasl.username', '7UWZWTH543V5LEZF');
//$conf->set('sasl.password', '2UcdkvVR5Le4w/Wec/5lQ/yfVwt/fF1ySYSf1ukE3aSFdISgyUxkjoX8uE3BfDro');

$producer = new \RdKafka\Producer($conf);
$t = 30;
//while (true) {
    //$message = readline("Write a message: ");

    for($i= 1; $i<$t; $i++){
        $message = "I love Bangladesh mytopic1 ".$i." th looping";
        $message_second = "I love Bangladesh mysecondtopic ".$i." th looping";
        $topic = $producer->newTopic('mytopic1');
        $topic_second = $producer->newTopic('mysecondtopic');
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, $message);
        $topic_second->produce(RD_KAFKA_PARTITION_UA, 0, $message_second);
        $producer->flush(1000);
    }

//}