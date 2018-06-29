<?php
/*
    strlen( )与 mb_strlen( )的作用分别是什么(新浪网技术部)

    strlen和mb_strlen都是用于获取字符串长度。
    strlen只针对单字节编码字符，也就是说它计算的是字符串的总字节数。如果是多字节编码，如 gbk 和 utf-8，使用 strlen 得到是该字符的总字节数；
    可以使用mb_strlen获取其字符个数，使用mb_strlen 要注意两点，一是要开启 mbstring 扩展，二是要指定字符集。
    总结：
    strlen函数不管是字符串是单字节编码还是多字节编码，函数返回的结果都是字符串的总字节数。

    mb_strlen函数当字符串是单字节编码时，函数返回的结果是字符串的总字节数。当字符串是多字节编码时，函数返回的结果是字符串的个数。
    mb_strlen函数在没有指定字符编码时，表示使用默认字符编码，即单字节编码，函数返回的是字符串的总字节数。
    PHP默认是单字节编码（内部字符编码），多字节编码方式有gbk、utf-8等。
    英文一个字符 1个字节  中文一个文字 3个字节 utf-8   有可能3个以上复杂文字的话
*/
    header('Content-Type:text/html;charset=utf-8');
    // (1)英文字符串
    $str1 ="duang~";
    echo strlen($str1);//总字节数为6，内部字符编码，单字节编码
    echo "<br />";
    echo mb_strlen($str1);//总字节数为6，内部字符编码
    echo "<br />";
    echo mb_strlen($str1,'utf-8');//总字节数或字符长度为6，指定字符编码（utf-8），多字节编码
    echo "<hr />";

    // (2)中文字符串
    $str2 = "你是我的小苹果";
    echo strlen($str2);//总字节数为21，内部字符编码，单字节编码
    echo "<br />";
    echo mb_strlen($str2);//总字节数为21，内部字符编码
    echo "<br />";
    echo mb_strlen($str2,'utf-8');//字符长度为7，指定字符编码（utf-8），多字节编码


















