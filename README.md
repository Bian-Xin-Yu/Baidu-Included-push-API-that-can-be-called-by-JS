# Baidu-Included-push-API-that-can-be-called-by-JS
可JS调用的百度收录推送API-替代百度自动推送

## 这是什么？
这是对百度收录自动推送功能的补充,因为百度自动推送功能下线维护频繁
它通过API推送给百度收录，除了需要推送用的准入密钥之外，体验和百度自动推送相同

**详解百度自动推送：**
> 自动推送JS代码是百度搜索资源平台最新推出的轻量级链接提交组件，站长只需将自动推送的JS代码放置在站点每一个页面源代码中，当页面被访问时，页面链接会自动推送给百度，有利于新页面更快被百度发现。

## 如何使用？
它为Hexo等静态网站设计，因此使用方法向Hexo倾斜；也可在其他网站使用，请自行调整

1. 将 `request/css` `request/js` 复制到Hexo根目录的 `source` 文件夹下
2. 修改Hexo配置文件 `_config.yml` 找到配置项 `skip_render:` 添加 `- js/myjs-api.js` `- css/mycss-api.css` 一行一个
3. 修改Hexo根目录的 `source/js/myjs-api.js` 找到 `var keyValue = "thhoH0JaP6xN9GLF";//填写推送用的准入密钥` 修改为你在“百度搜索平台”的API推送密钥；找到 `var apiValue = "http://192.168.8.6/api.php";//api地址` 如果你有可以运行php的环境，可以自己部署api；如果没有，可以填写<img src="https://uosblog.top/wp-content/uploads/2021/04/2021040905561225.png" width="5%"/><a href="https://github.com/Deng-Xian-Sheng">GitHub靳灿奇</a>的 `https://api.uosblog.top/api.php`
4. 找到你的Hexo主题中描述页脚部分的文件，添加 `request/request.html` 中 `<!--代码开始-->` `<!--代码结束-->` 之间的代码
5. 修改Hexo根目录的 `source/js/myjs-api.js` 找到 `<img id="myImage" src="" width="3%">` 修改 `width="3%"` 个性化图标大小

## 使用效果
如果推送成功就返回心型图片，如果失败就返回心碎图片；下一步还将添加推送次数统计、防止重复推送功能
<p>
<img src="https://uosblog.top/wp-content/uploads/2021/04/2021040906354850.png" width="50%"/>
<img src="https://uosblog.top/wp-content/uploads/2021/04/2021040906354848.png" width="50%"/>
</p>
**如果只是使用，看到这里就可以了**
## API部署
将 `api/api.php` `api/Xin.png` `api/XinSui.png` 复制到网站目录(同目录)，需要使用PHP扩展:GD库、curl
