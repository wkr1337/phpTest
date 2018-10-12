<?php 
// foreach( $_POST as $stuff ) {
//     if( is_array( $stuff ) ) {
//         foreach( $stuff as $thing ) {
//             echo $thing;
//         }
//     } else {
//         echo $stuff;
//     }
// }
// foreach ($_POST as $name => $val)
// {
//      echo htmlspecialchars($name . ': ' . $val) . "\n";
// }
if(!empty($_POST["firstname"])){
    $firstname = htmlspecialchars($_POST["firstname"]);
    echo "test";
    echo $firstname;
    $msg = date('Y-m-d H:i:s') . $firstname;
    // mail("willem.roos@live.nl", "PHP Mailer", $msg);
}else{
    echo "FAILED";
}