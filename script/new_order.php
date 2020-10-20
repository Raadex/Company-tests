<?php
$url_get_data = 'http://kit-consulting-dev.ru/test/orders/get';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$url_get_data?id=$id");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $order_data = curl_exec($curl);
    curl_close($curl);
    
}
if (!empty($order_data)) {
    $client = new \RetailCrm\ApiClient(
        'https://demo.retailcrm.ru',
        'T9DMPvuNt7FQJMszHUdG8Fkt6xHsqngH',
        \RetailCrm\ApiClient::V4
    );
    
    try {
        $response = $client->request->ordersCreate($order_data);
    } catch (\RetailCrm\Exception\CurlException $e) {
        echo "Connection error: " . $e->getMessage();
    }
    
    if ($response->isSuccessful() && 201 === $response->getStatusCode()) {
        echo 'Order successfully created. Order ID into retailCRM = ' . $response->id;
            // or $response['id'];
            // or $response->getId();
    } else {
        echo sprintf(
            "Error: [HTTP-code %s] %s",
            $response->getStatusCode(),
            $response->getErrorMsg()
        );
    
        // error details
        //if (isset($response['errors'])) {
        //    print_r($response['errors']);
        //}
    }
}
