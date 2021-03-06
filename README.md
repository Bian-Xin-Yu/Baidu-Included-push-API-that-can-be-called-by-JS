# Baidu-Included-push-API-that-can-be-called-by-JS
可JS调用的百度收录推送API-替代百度自动推送

## 这是什么？
这是对百度收录自动推送功能的补充,因为百度自动推送功能下线维护频繁

它通过API推送给百度收录，除了需要推送用的准入密钥之外，体验和百度自动推送相同

**详解百度自动推送：**
> 自动推送JS代码是百度搜索资源平台最新推出的轻量级链接提交组件，站长只需将自动推送的JS代码放置在站点每一个页面源代码中，当页面被访问时，页面链接会自动推送给百度，有利于新页面更快被百度发现。

## 如何使用？
它为Hexo等静态网站设计，因此使用方法向Hexo倾斜；也可在其他网站使用，请自行调整

1. 编辑 `request/request.html` 找到 `var keyValue = "666";//填写推送用的准入密钥` 修改为你在“百度搜索平台”的API推送密钥；
2. 找到你的Hexo主题中描述页脚部分的文件，添加 `request/request.html` 中 `<!--代码开始-->` `<!--代码结束-->` 之间的代码,如果不方便直接添加可保存为文件引入
3. 根据您的页面个性化调节心型图标大小，找到 `<img id="myImage" src="" width="45px">` 修改 `width="45px"`

## 使用效果
如果推送成功就返回心型图片，如果失败就返回心碎图片；累计推送次数、并防止重复推送
<p>
<img src="https://uosblog.top/wp-content/uploads/2021/04/2021041402381893.png" width="75%"/>
<img src="https://uosblog.top/wp-content/uploads/2021/04/2021041402382472.png" width="75%"/>
<img src="https://uosblog.top/wp-content/uploads/2021/05/2021051113183091.png" width="75%"/>
</p>

**如果只是使用，看到这里就可以了**
## API部署
1. 将 `api/` 所有文件复制到网站目录(同目录)，PHP需要扩展:GD库、curl (php-mysql如果您的数据库是MySql的情况下)
2. 创建数据库，创建拥有此数据库权限的用户，编辑 `api/api-database.php` 填写数据库名、数据库用户名、数据库用户密码
