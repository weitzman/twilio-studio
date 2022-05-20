#!/usr/bin/env php
<?php

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

$execution = $twilio->studio->v2->flows("FW1386a5b79825cef92dee81010f4f1757")
->executions
->create("+16179708237", "+1775522-8136");

print($execution->sid);