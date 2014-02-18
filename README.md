php-ext-lib
===========

php扩展包,对原生扩展的二次封装,更容易使用


###当前支持的功能扩展,__详细的使用方法请参照对应测试用例下的实例__
 1. Db_MysqlPdo       (请参见/Test/Db/MysqlPdo/LockTable.php和/Test/Db/MysqlPdo/Transaction.php)
 2. Tools_Common      (请参见/common.php)
 3. Tools_Xml         (请参见/Test/Tools/Xml.php)
 4. Network           (请参见/Test/Network.php)

###测试&&打包方式
    //测试
    ant -f build.xml unit_testing
    //打包
    ant -f build.xml unit_testing