<?php

$mystr = "Stephen Edwin King is an American author of horror, supernatural fiction, suspense, science fiction, and fantasy. His books have sold more than 350 million copies, many of which have been adapted into feature films, miniseries, television shows, and comic books. King has published 54 novels, including seven under the pen name Richard Bachman, and six non-fiction books. He has written nearly 200 short stories, most of which have been collected in book collections. Many of his stories are set in his home state of Maine. His novella Rita Hayworth and Shawshank Redemption was the basis for the movie The Shawshank Redemption which is widely regarded as one of the greatest films of all time. ";
$output="";
$result = array();
$result = explode(" ",$mystr);
$count=0;

for ($i = 0; $i < count($result); $i++)
{
    if (($i + 1) % 3 == 0){
        $result[$i] = strtoupper($result[$i]);
    }
    $bufarray = str_split($result[$i]);
    for ($k = 0; $k < count($bufarray); $k++)
    {
        if (($bufarray[$k] == "o") || ($bufarray[$k] == "O")){
            $count++;
        }
        if (($k + 1) % 3 == 0 ){
            $bufarray[$k] = "<span style = 'color: purple'>" .$bufarray[$k]."</span>";
        }
    }
    $result[$i] = join("",$bufarray);
}
$output = implode(" ", $result);
echo $output;
echo "<br><br>number of o and O is $count";