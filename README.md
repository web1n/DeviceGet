# DeviceGet
这是一个 Typecho插件,可以在每条评论后面加上评论者的手机型号信息.

![效果图](https://raw.githubusercontent.com/web1n/DeviceGet/master/%E6%8D%95%E8%8E%B7.PNG)

### 如何使用?

1. 下载 DeviceGet.php , 复制文件到 Typecho 安装目录/usr/plugin/ 下.

2. 启用插件

3. 在你的网站模板适合的地方插入:

```php 
<?php echo DeviceGet::getDevice($comments->agent); ?>
```

完成,打开你的网站看看效果吧:)



### DEMO站点

[web1n](https://https.vc)



### Licence

```html
Copyright 2018 web1n

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```
