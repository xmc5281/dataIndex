此文件夹注册了自己封装的函数
如：单个字段二维数组转一维数组函数madeOne
注册方法：
首先：
在根目录下的app目录下创建一个文件夹Common，然后新建一个functions.PHP的文件，接着就可以根据需要写入自己的自定义函数啦，不过为了避免和laravel框架自身的函数冲突，最后在定义之前，先作一下判断。
例如：
if(!function_exists('getName'))  
{  
    function getName()  
    {  
        return 'zhangsan';  
    }  
}  

然后：
此时我们需要告诉框架去加载我们的自定义函数的文件。所以，打开根目录下的bootstrap目录下的autoload.php。
在中间或者是最后一行插入如下代码：
if(file_exists(__DIR__ . '/../app/Common/functions.php'))  
{  
    require __DIR__ . '/../app/Common/functions.php';  
}