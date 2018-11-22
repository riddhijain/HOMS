// The length we want the unique reference number to be  
$unique_ref_length = 8;

// A true/false variable that lets us know if we've
// found a unique reference number or not
$unique_ref_found = false;

// Define possible characters.
// Notice how characters that may be confused such
// as the letter 'O' and the number zero don't exist
$possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";

// Until we find a unique reference, keep generating new ones
while (!$unique_ref_found) {

    // Start with a blank reference number
    $unique_ref = "";

    // Set up a counter to keep track of how many characters have
    // currently been added
    $i = 0;

    // Add random characters from $possible_chars to $unique_ref
    // until $unique_ref_length is reached
    while ($i < $unique_ref_length) {

        // Pick a random character from the $possible_chars list
        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);

        $unique_ref .= $char;

        $i++;

    }

    // Our new unique reference number is generated.
    // Lets check if it exists or not
    $query = "SELECT `order_ref_no` FROM `orders`
              WHERE `order_ref_no`='".$unique_ref."'";
    $result = mysql_query($query) or die(mysql_error().' '.$query);
    if (mysql_num_rows($result)==0) {

        // We've found a unique number. Lets set the $unique_ref_found
        // variable to true and exit the while loop
        $unique_ref_found = true;

    }

}

echo 'Our unique reference number is: '.$unique_ref;
