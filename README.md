ArrayToString
====================
2015-10-27



Utility to export a php array in various string formats.




Features
------------

- extensible: create your own formats 
- comes with 5 native formats: space indented, html, inline args, php, php function args

  
  
How to use
--------------
  
ArrayToString is a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).
  
```php  
<?php


require_once "bigbang.php";

use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\HtmlArrayToStringSymbolManager;
use ArrayToString\SymbolManager\InlineArgsArrayToStringSymbolManager;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;
use ArrayToString\SymbolManager\SpaceIndentedArrayToStringSymbolManager;
use ArrayToString\SymbolManager\PhpFunctionArgsArrayToStringSymbolManager;


$a = [
    'pou' => 456,
    'aaa' => 777,
    'bbb' => [
        'omélie' => 'archeval',
        'pedros' => 'la casa',
    ],
];

//header("content-type: text/plain");
echo '<h3>Space Indented</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new SpaceIndentedArrayToStringSymbolManager())->toString($a);
echo '<h3>Html</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new HtmlArrayToStringSymbolManager())->toString($a);
echo '<h3>Inline args</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new InlineArgsArrayToStringSymbolManager())->toString($a);
echo '<h3>Php</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new PhpArrayToStringSymbolManager())->toString($a);
echo '<h3>Php Function Args</h3>';
echo ArrayToStringUtil::create()->setSymbolManager(new PhpFunctionArgsArrayToStringSymbolManager())->toString($a);

```
  

  
More about the native formats
--------------------------------
  
  
### Space Indented 
  
Just prints 4 spaces between the array values.
In the given example above, the output would be: 
  
  
    456    777    'archeval'    'la casa'   
  
  
### Html 
  
Prints an html friendly version of the array.
If you run the above example in a browser, you will visually see this:

    [
        'pou' => 456,
        'aaa' => 777,
        'bbb' => [
            'omélie' => 'archeval',
            'pedros' => 'la casa',
        ],
    ]  
    
And if you looked at the source code, you would see the necessary \n, \t and \<br> that were used to produce
the result.


### Inline Args

Use this format if you want the array to fit on a single line.
For instance, if you want to display the array content in an exception message.
The above example would look like this:


    ['pou' => 456,'aaa' => 777,'bbb' => ['omélie' => 'archeval','pedros' => 'la casa']]


### Php 

This format is like the native php's var_export.
The only difference that I see is that ArrayToString's Php native format uses the [] notation for arrays,
will the php native export function uses the array() notation.

The important thing is that you need this format when you want to dynamically write an array in php code.
 
 
```
// generated with ArrayToString's Php format  
[
    'pou' => 456,
    'aaa' => 777,
    'bbb' => [
        'omélie' => 'archeval',
        'pedros' => 'la casa',
    ],
]

// generated with php's var_export native function
array (
  'pou' => 456,
  'aaa' => 777,
  'bbb' => 
  array (
    'omélie' => 'archeval',
    'pedros' => 'la casa',
  ),
) 
```
 
 
### Php Function Args  

This format converts an array into php function arguments.
You can use the output directly as function arguments in your php code.

Here is the output of the above example.


```
456,
777,
[
    'omélie' => 'archeval',
    'pedros' => 'la casa',
]
```





How does it work?
--------------------

You have the ArrayToStringUtil class which is the engine.
The engine uses a well defined but abstract structure (see comments in the class for more details) of an array.

The engine needs a symbolManager object to resolve the actual structure symbols.







  