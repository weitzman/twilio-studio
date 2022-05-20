#!/usr/bin/env php
<?php

$args = $_SERVER['argv'];

if (!$flow_id = $args[1]) {
    throw new InvalidArgumentException('Flow ID is required');
}
if (!$phone_from = $args[2]) {
    throw new InvalidArgumentException('From Phone is required');
}
if (!$route = $args[3]) {
    throw new InvalidArgumentException('Route is required');
}
else {
    $params['route'] = $route;
}
if (!$path = $args[4]) {
  throw new InvalidArgumentException('Path is required');
}
else {
  if (($handle = fopen($path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $rows[] = $data;
    }
    fclose($handle);
  }
}

// For mail merge later.
// parse_str($params_str, $params);

/**
 * See https://www.twilio.com/docs/studio/rest-api/v2/execution
 */

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("TWILIO_ACCOUNT_SID");
$token = getenv("TWILIO_AUTH_TOKEN");
$twilio = new Client($sid, $token);

foreach ($rows as $row) {
    $phone_to = $row[0];
    unset($row[0]);
    array_merge($params, $row);
    $execution = $twilio->studio->v2->flows($flow_id)
      ->executions
      ->create($phone_to, $phone_from, ['parameters' => $params]);
    print($execution->sid) . "\n";
}