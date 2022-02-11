<?php

$input = '{"world":"Earth!","moon":"Moon","continents":{"Europe":{"counries":["Bulgaria","France","Vatican"]},"0":"America","1":"Asia","2":"Africa"},"size":44000,"habitanats":true}';

$decode = json_decode($input); // Обръщане на JSON в обект(и)
?>
<pre>
<?php

//var_dump($decode);

var_dump($decode->continents);

//var_dump($decode->continents->Europe);

//var_dump($decode->continents->{"0"});

?>
</pre>

<hr />

<pre>
<?php
    foreach($decode->continents as $key => $element) {
        var_dump($key, $element);
    }
?>
</pre>