{$foo}        <-- displaying a simple variable (non array/object)
{$foo[4]}     <-- display the 5th element of a zero-indexed array
{$foo.bar}    <-- display the "bar" key value of an array, similar to PHP $foo['bar']
{$foo.$bar}   <-- display variable key value of an array, similar to PHP $foo[$bar]
{$foo->bar}   <-- display the object property "bar"
{$foo->bar()} <-- display the return value of object method "bar"
{#foo#}       <-- display the config file variable "foo"
{$smarty.config.foo} <-- synonym for {#foo#}
{$foo[bar]}   <-- syntax only valid in a section loop, see {section}
{assign var=foo value='baa'}{$foo} <--  displays "baa", see {assign}

Many other combinations are allowed

{$foo.bar.baz}
{$foo.$bar.$baz}
{$foo[4].baz}
{$foo[4].$baz}
{$foo.bar.baz[4]}
{$foo->bar($baz,2,$bar)} <-- passing parameters
{"foo"}       <-- static values are allowed

{* display the server variable "SERVER_NAME" ($_SERVER['SERVER_NAME'])*}
{$smarty.server.SERVER_NAME}

Math and embedding tags:

{$x+$y}                             // will output the sum of x and y.
{assign var=foo value=$x+$y}        // in attributes 
{$foo[$x+3]}                        // as array index
{$foo={counter}+3}                  // tags within tags
{$foo="this is message {counter}"}  // tags within double quoted strings

Defining Arrays:

{assign var=foo value=[1,2,3]}
{assign var=foo value=['y'=>'yellow','b'=>'blue']}
{assign var=foo value=[1,[9,8],3]}   // can be nested

Short variable assignment:

{$foo=$bar+2}
{$foo = strlen($bar)}               // function in assignment
{$foo = myfunct( ($x+$y)*3 )}       // as function parameter 
{$foo.bar=1}                        // assign to specific array element
{$foo.bar.baz=1}                    
{$foo[]=1}                          // appending to an array

Smarty "dot" syntax (note: embedded {} are used to address ambiguities):

{$foo.a.b.c}        =>  $foo['a']['b']['c'] 
{$foo.a.$b.c}       =>  $foo['a'][$b]['c']         // with variable index
{$foo.a.{$b+4}.c}   =>  $foo['a'][$b+4]['c']       // with expression as index
{$foo.a.{$b.c}}     =>  $foo['a'][$b['c']]         // with nested index

PHP-like syntax, alternative to "dot" syntax:

{$foo[1]}             // normal access
{$foo['bar']}
{$foo['bar'][1]}
{$foo[$x+$x]}         // index may contain any expression
{$foo[$bar[1]]}       // nested index
{$foo[section_name]}  // smarty {section} access, not array access!

Variable variables:

$foo                     // normal variable
$foo_{$bar}              // variable name containing other variable 
$foo_{$x+$y}             // variable name containing expressions 
$foo_{$bar}_buh_{$blar}  // variable name with multiple segments
{$foo_{$x}}              // will output the variable $foo_1 if $x has a value of 1.

Object chaining:

{$object->method1($x)->method2($y)}

Direct PHP function access:

{time()}