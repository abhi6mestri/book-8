<?php
require('./stripe-php/init.php');

$publishableKey=
"pk_test_51I954rD9BZpyI2ENo4sZIqjBilWjpErqfJKdpx4GIdhD3YzALhJg86iKRGree7DN6dMf2uXK20dVJxT2Ypf3pnCW00LkJtypVb";

$secretKey=
"sk_test_51I954rD9BZpyI2ENddHMYMaDebPcLR6A5Fvl69suvVmqg95STTFAcSnbDlboWdbHoPkABlLzUz6F2CZIEMV5w0Ig00GHk9CKWZ";

\Stripe\Stripe::setApiKey($secretKey);
  
?>