
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"to\":[{\"email\":\"julean.vlad@yahoo.com\",\"name\":\"John Doe\"}],\"subject\":\"Hello, World!\"}],\"from\":{\"email\":\"testmail@test.com\",\"name\":\"mail de test de la vlad\"},\"reply_to\":{\"email\":\"sam.smith@example.com\",\"name\":\"Sam Smith\"},\"subject\":\"test\",\"content\":[{\"type\":\"text/html\",\"value\":\"<html><p>Finnaly</p></html>\"}]}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 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",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}