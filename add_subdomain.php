<?php
$subdomain = $_POST['subdomain']; // 添加子域名POST获得
$ip_address = $_POST['ip_address']; // 要添加的服务器IP地址POST获得

// API设置关键点和端点
$api_key = "YOUR_API_KEY";
$email = "YOUR_CLOUDFLARE_EMAIL";
$endpoint = "https://api.cloudflare.com/client/v4/zones/DOMAIN_ZONE_ID/dns_records";

// 请求数据
$data = array(
    "type" => "A",
    'name' => $subdomain,
    'content' => $ip_address,
    "ttl" => 1,
    "proxied" => true
);


// cURL设置选项
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "X-Auth-Email: " . $email,
    "X-Auth-Key: " . $api_key
));

// cURL执行
$response = curl_exec($ch);
curl_close($ch);

// 分析结果
$result = json_decode($response, true);
if ($result["success"] == true) {
    echo "Record A has been successfully added to CloudFlare.<br>It takes 10 minutes~1 hour for SSL and DDoS protection to take effect on the domain.<br>Changing the DNS or changing the IP address via VPN and accessing the domain in a private window may speed up the reflection.";
} else {
    echo "An error occurred while adding to CloudFlare.： " . $result["errors"][0]["message"] . "<br><br>[DNS Validation Error], you may have tried to add a domain that is not hosted by this hosting account.<br><br>[Record already exists.], the registration to CloudFlare has already been completed. Please wait for a while.<br>Also, sending multiple additional requests will not speed up the reflection. It will be even slower because of the load.";
}
?>
