mofh-enable-cloudflare
为 myownfreehost 子域启用 CloudFlare

描述。
演示站点：https://cftest.idmx.eu.org/

这是在 CloudFlare 中添加和激活 A 记录的示例代码。

安全风险由您自行承担。

您将需要了解 PHP 来修改并将其集成到您的客户领域。

不确定这是否适用于 MOFH 提供的免费托管服务器，但可能会。

我英语不好，可能无法回答问题等。

我的英语不好，所以如果您需要任何帮助，请在 MOFH 社区或 IfastNet Discord 上寻求帮助。

如何使用
在客户区域的任何地方编写add.html代码。

将add_subdomain.php上传到代码在 1 中的文件所在的目录中。

在 CloudFlare 注册并将您希望激活 CloudFlare 的域添加到 CloudFlare。

从 CloudFlare 仪表板获取全局 API 密钥，替换 add_subdomain.php 中的 $api_key。

将 add_subdomain.php 中的$email替换为您在 CloudFlare 注册的电子邮件地址。

替换add_subdomain.php$endpoint中的 $DOMAIN_ZONE_ID。要获取ZONE_ID，请转到 CloudFlare 仪表板，单击您的域，它将列在 [概述] 下。

注意力。
您需要更改名称服务器才能将您的域添加到 CloudFlare。

在用户使用此脚本处理要添加到 CloudFlare 的域之前，该网站将无法访问。 该问题可以通过在此用户注册子域时自动运行此脚本来解决，但这取决于您的客户区环境，您必须自己进行改进。
