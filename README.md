php-ext-lib
===========

php扩展包,对原生扩展的二次封装,更容易使用


###当前支持的功能扩展,__详细的使用方法请参照对应测试用例下的实例__
|功能					| 类名			| 使用示例|
|:---					|:---			|:---|
| mysqlpdo支持			| [Db_MysqlPdo](https://github.com/alonestar/php-ext-lib/tree/master/Library/Db/MysqlPdo.php)	| [/Test/Db/MysqlPdo/LockTable.php](https://github.com/alonestar/php-ext-lib/tree/master/Test/Db/MysqlPdo/LockTable.php) [/Test/Db/MysqlPdo/Transaction.php](https://github.com/alonestar/php-ext-lib/tree/master/Test/Db/MysqlPdo/Transaction.php) |
| 项目初始化支持			| [Tools_Common](https://github.com/alonestar/php-ext-lib/tree/master/Library/Tools/Common.php)	| [/common.php](https://github.com/alonestar/php-ext-lib/tree/master/common.php) |
| XML支持(array转XML)	| [Tools_Xml](https://github.com/alonestar/php-ext-lib/tree/master/Library/Tools/Xml.php)		| [/Test/Tools/Xml.php](https://github.com/alonestar/php-ext-lib/tree/master/Test/Tools/Xml/Xml.php) |
| http请求支持(封装CURL)	| [Network](https://github.com/alonestar/php-ext-lib/tree/master/Library/Network.php)			| [/Test/Network.php](https://github.com/alonestar/php-ext-lib/tree/master/Test/Network/Network.php) |

###测试&&打包方式
    //测试
    ant -f build.xml unit_testing
    //打包
    ant -f build.xml unit_testing
