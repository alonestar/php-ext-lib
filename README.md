php-ext-lib
===========

php扩展包,对原生扩展的二次封装,更容易使用


###当前支持的功能扩展,__详细的使用方法请参照对应测试用例下的实例__
|功能					| 类名			| 使用示例|
|:---					|:---			|:---|
| mysqlpdo支持			| Db_MysqlPdo	| /Test/Db/MysqlPdo/LockTable.php /Test/Db/MysqlPdo/Transaction.php |
| 项目初始化支持			| Tools_Common	| /common.php |
| XML支持(array转XML)	| Tools_Xml		| /Test/Tools/Xml.php |
| http请求支持(封装CURL)	| Network		| /Test/Network.php |

###测试&&打包方式
    //测试
    ant -f build.xml unit_testing
    //打包
    ant -f build.xml unit_testing