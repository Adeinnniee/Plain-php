<?php

// 1. This program reverses the following sentence iteratively and recursively
$sentence = "The Lord is my Shepherd, I shall not want";


// reverse iteratively 
function iterative_reverse($sentence){

    $reverse_sentence = "";

    // loop backwards
    for($character = strlen($sentence) - 1; $character >= 0; $character--){

       $reverse_sentence .= $sentence[$character];

    }

    return $reverse_sentence;

}


// reverse recursively
function recursive_reverse($sentence){

    // get the length of the sentence
    $sentence_length = strlen($sentence);

    if($sentence_length == 1){

        return $sentence;

    } else{

        // extract the last character
        $last_character = substr($sentence, -1);

        // concatenate recursively
        return  $last_character.recursive_reverse(substr($sentence, 0, -1));
    }
}


// Outputs
echo "<h3>1. Reverses the following sentence iteratively and recursively.</h3>";
echo "The sentence is: <b>".$sentence."</b>";
echo "<br><br>The sentence in reverse iteratively is <b>".iterative_reverse($sentence)."</b>";
echo "<br><br>The sentence in reverse recursively is <b>".recursive_reverse($sentence)."</b>";


// 2. This program counts and groups similar words from a file called PhPFrameWork.txt to a new file.

// blank line
echo "<br><br>";
echo "<h3>2. Counts and groups similar words from a file called PhPFrameWork.txt to a new file.</h3>Similar words counted and grouped from the PhPFrrameWork.txt file are displayed in a new file called SimilarWordsGrouped.txt.";

// read the file
$framework_file = file_get_contents('PhPFrameWork.txt');

// replace commas, full stop and new line characters with only the whitespace character
$chars_to_replace = [". ", ".", ", ", "\n"];
$framework_file = str_replace($chars_to_replace, ' ', $framework_file);

// split the individual words into an array
$words_array = explode(" ", $framework_file);

// count the occurence(s) of every word into an array
$words_count_array = array_count_values($words_array);

// create a new file to display similar words counts and group each of them
$new_file = fopen("SimilarWordsGrouped.txt", "w");

// print the number of times each similar word occurs
fwrite($new_file, "The number of times each word occurs are:\n\nWORD - COUNT\n");

foreach($words_count_array as $each_word => $each_count){

    // similar words are words that appear more than once
    if($each_count > 1){
        fwrite($new_file, $each_word." - ".$each_count."\n");
    }
}

// create blank lines in the new file
fwrite($new_file, "\n\n\nGrouping the similar words:\n\n");

// group the similar words together while printing the whole contents 
foreach($words_count_array as $each_word => $each_count){

    for($i = 0; $i < $each_count; $i++){

        fwrite($new_file, $each_word.' ');
        
    }
}

// close the new file
fclose($new_file);

?>