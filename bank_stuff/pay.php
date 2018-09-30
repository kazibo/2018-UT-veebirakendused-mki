<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - Swedbank - pangalink.net</title>
    </head>
    <body>
<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2018 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEA3Oh3wuxlT9mN7s/2izrAFOukgUxt/NRJa/Zxlvs12lfCrnnp
Iqbc2M+HiZI3zJl1r66k/dCr671HmUj1oFVW1NnhQ3EGVnBzcbeX3fwJvAcV3tAd
moxx7472/cBfTL7fFMJV816zmffeTscVY5MkmOaIJsuHFFicU9z0y+SJn++nFHj2
8VUANOyAMvuBkFKIbS72OZoJDRlkDeK+cYGf7d3ts9kL4FXc7+kTwsEsVN3mR1X1
ddKqqsiWh1BVMVkNCbWWIV3f9R52UL6QLjJPiBLNuKg/rznjTSYTLAXowaULfPhN
O8/U+m27Zurfe5ch2M4kEpa7tnCxdjf3eWT63QIDAQABAoIBAQCMdyTvxPEGvQcK
+yGBlnHc25lWvgqR4UpuY94GauXrWDJqTwp3BjMXiZ5dU6Q3bLzwYNR4r98hntGQ
HlxQ/vKflYsvHwcwn4BIprziYgiujrLRYvPv+a3Y7ccPwurWGegvgwK0JVt+Y6Xv
4ZcwIbf7oVqhkHjr7ww4Jx9hJoh8MO/kZKWsE9qUu8nZEHwNYFep/UIaJHUClfjP
2+alPkzyiRdl2av9Priu/G+oP5tE4vBjsDV3fIoeMsAQbc6nxbzqMoTSXLwdNa3Z
EwVHRIs/nz6dgQdy1WbtAxIZn5KdZsRN4g17ZuPdCxC9VNZ8u38+W/xZqkPir9GC
Sm4PIWUBAoGBAPsfOdzwWfpEDezrumAkGqtBTC2ss/jBCXqWP1u1f7rWOk+z6KLK
3nUvIkt9RafHIP3TZrElfj366rLzCSVvmP1Ng2XG2UPVJxebmFKwif/I272Yk/Lq
UiTeOy5eV45zVAv97mJfUEGvBR0N5fYZvrAcbRkevpB7Mi1edWzdZ7Y1AoGBAOEy
/qirW/71Zp6NUmX+f3zISVNK2w9rGprY94hGUnr7S0pcOmmhkG7kq6mGzTm57lDx
8MiEgpyWVImS6kH0o2F3AJtc6qVNnJQ8JbWv7B38YtzWUFNUuZXS90iwFcdH0hfk
og1HaZybq5GRQbsHNWdOOURrFJWAz9BnNE/Ft6cJAoGAB5RHsM1oSc9oBDCRLXmp
fGW6IN7Hh8h7usFyJBh0RHVWyTUK3m71C+BiTpj3UzsFWePZg5s4FjLOhpwjOIgH
vA1s29OGly+FwIansEc3wwqS50QFox1DYW17p8idJ+V/MeV2Hm32BCV+KARVXnok
cThKaqms4rt1Jj1lmeWMzckCgYB6bq0AqlkTnfsyjAaWKOzKvGERBYtfMI2ATiEV
V5YUAncGcGnZb9sETxH80qrUjX9BRqfvfAs+coR3XwY44XXJ0VblIHj5cd6EwMaH
pqMqEkL1aRa2l0NmbxG91O2iMCvKjaSEr6R9XizCsUQZGGwyQ9bimYzRUvyogtNv
40BbcQKBgQC5d++6kRoLsguEvIxp4Z4Iv66orHiNzOHG8SuzOeViBGAtBAAbutHr
nCLMrI6lbkXpjKa1Ef2cu5/p4gGb9+0Wr86J7qCmRlYWJU/YVyZBbQJJbdEO+OWE
rz7osdSu7O61MQsky6r2qj/laOHFgDUkW2Iv1CXLcuzKgXMq3P6VnA==
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid13",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE152200221234567897",
        "VK_NAME"        => "ÕIE MÄGER",
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "http://localhost:3480/project/5bb10aad1caa707868b71971?payment_action=success",
        "VK_CANCEL"      => "http://localhost:3480/project/5bb10aad1caa707868b71971?payment_action=cancel",
        "VK_DATETIME"    => "2018-09-30T17:49:52+0000",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid13 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:3480/project/5bb10aad1caa707868b71971?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:3480/project/5bb10aad1caa707868b71971?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2018-09-30T17:49:52+0000 */

/* $data = "0041011003008005uid1300512345003150003EUR020EE152200221234567897009ÕIE MÄGER0071234561011Torso Tiger077http://localhost:3480/project/5bb10aad1caa707868b71971?payment_action=success076http://localhost:3480/project/5bb10aad1caa707868b71971?payment_action=cancel0242018-09-30T17:49:52+0000"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* Gntf1P/Rz4njbexWLzgGOtFFceSt1c/p6FRxUYaO7B79bRsHqYe7bjr6d10wBGWXbBLfzLcAR1hqMjU9QQrbujblHPZ6g9dgHXYxO9VkRVByJqryvYYFTW4PysGIaCnb2wCltwYY8ddbJjWMcytOTULWmhsP4B8merkqUqE7QnBHSOIJYp3t3u8LmSyG+XfT6ePna682VaHsZ9eUsgJ0x0mhvZdAtaJbQbD2MpEpDKD+COa7Cu+du4ys+/OLGJGTA2kTbpPoWbvoakCNifBAaTLV/roYC6AT59nmS5Ifa1Y9mvvCN93CF/BqxRve9fI3QeNFF65xjGv506GsRtnugw== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:3480/">Pangalink.net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"Nelichan donation"</strong></p>

        <form method="post" action="http://localhost:3480/banklink/swedbank">
            <!-- include all values as hidden form fields -->
<?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
<?php endforeach; ?>

            <!-- draw table output for demo -->
            <table>
<?php foreach($fields as $key => $val):?>
                <tr>
                    <td><strong><code><?php echo $key; ?></code></strong></td>
                    <td><code><?php echo htmlspecialchars($val); ?></code></td>
                </tr>
<?php endforeach; ?>

                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
            </table>
        </form>

    </body>
</html>
