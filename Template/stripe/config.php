<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51MkSIbSBoA9w6HErgdT54tEkA6e6bYtXeUsFmoG64CHr7pvMi87ORF37wScmCyoFDkeQhSOdGnYLvglCribwkk6l002xiVfvPf",
        "publishableKey" => "pk_test_51MkSIbSBoA9w6HErC6k8FhbLBS2f7UJaLPq0x6fB9EunOFaxckUlDa950KgkTKirYIXhmjz69HlP2Z1mrGxLgfCH00qUkyLLU1"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>