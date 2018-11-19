<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2018 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEA7GcyYV1fRAPMiGLP1wKuuVjCjHPQGmCXyqj5AqPbRlxQR683
9UjR6tPPWUa9xiuc9nnzjMorqSRbFJTMCyd8eSeXW3O5faJ+VYapA4QD+vzbBCBg
xiAf9YulreNAjHGPSrN/8lciGe/u7VmRleOK8hBGmkxaVi1TuTjrgi5aJxXFCxzt
tcX8Evw69u4Mdaej3naBjhYgwZdS1eoNoPi0TsVSslb1+sgv7PpEE8EfCTwe3nL2
jZUb7ZzvBP/0gtrKwtSPsPpFu0Mn7bLYEYlbRl8ngKK0s/gt8TPItdHAXqXooKIr
jLp3ynIWi9OSLMdOfUfXFXGqq5/PBZVXgi+hTQIDAQABAoIBADX3hP/HIgVT3LBR
5mKOITb8tUT890fePyirlFTu9RLF5inHLT4YhptWCSK3TIFd2XJG+rtsN7VgME6t
fTsao4bA7AObkn/ExZRerly4GXSFnrX9cjoogUM7wvHETCsDjZOfEJlRHN7Q8DlM
1jhifoiuAIAe6Ax+QnupK9JHJJuBI2lmjwyw+8DqQ5sLm10H8TsDiVc8IX/EcWUk
pBZHE1ANr7TBNaGxhj6KjEDdKXT8WpR8riwk++MEhalYN4yCITRk2w/CaU+fWf88
067TlwDrUoABn9yTC1ceRmsTOHV6oeJ8s3RlUykNCuhDGBU4SM6OH8hD4rth8FTq
abNJdMECgYEA+igXShv1O/Z7fUmqJ8fVZfr+JlLFPAFb/W9flMT3R45uLdB+7HAO
1TYhITTCh6RqwRVkI9PdAxwKu1kTJzaQNocTAD3OQgafJt2FWDxVYBqppoZ9Qav5
UVKblRAz5ed3+G5N0huCf9ULBaRF1g/dwZN+8yytIWJBAX1MPnWPvb0CgYEA8ezc
h8YZOcX9FCsdNw7r/VQz0fPrkNtNd/jf+P03LY7Alk30II7cvcUFEGatyXnD34H9
pj1NHhJdMmy8T42GSOayDMLvoMSyWY1Qi1rEn+iCBrq670WdS6JHr0B+8QXvroE8
cjNQcfRoHEuaQRhwpH7BcO7Hh+D/duJLahfHQtECgYEAuDqYVErcw2lWLsH2n09r
WKyNSZoBiZySq8W/Bag9WKSLfhAjuWsZcWpo4bSiYxTyTfq8AirAhM69FJaYJXPo
p0+47Z+W7EdGJHBWCNJ+KcXZFTvMuXW2qm6FCDWjkvhyATLy+v6pkA1NDb2adPjA
XxSKFPrdEk3zA+7MHN+lmZ0CgYBuXNiJ09QkJ+746WYtfNApQ+VT7QtUjMa9aTp7
csBeNxYiOzOYOrP2mk9iGQVEuRii+MEGukZY5pW/cB1DyVMuJJeq/K6mT7Tw52eL
+v9h14ahnUOz7bUBEOnUx/5g441gtTInAsO7CH0KE28uLQEN+YkzhKpfkUPZLwiq
QGi1UQKBgQDYwyzqNzwDLlB5sf1XQ/l244RxWttMfzyFHaXSXTaEJ1Cwuh7HcWcJ
8mL14zX2rrCTczImOzpequm+eyLSMan6BoTe13neJocEVBPs35FFQjddTM8cSV/s
E4uJ6is2uTocnlzhmoLOUhk43ECSjFQrwDDkuTip4SCm7ywkDycYbA==
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$amount = filter_input(INPUT_POST, 'damount');
$timezone = date("Y-m-d\TH:i:sO");

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid13",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => $amount,
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE882200123123123123",
        "VK_NAME"        => "Nelichan",
        "VK_REF"         => "1234567897",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Charity",
        "VK_RETURN"      => "https://nelichan.tk/donate.php",
        "VK_CANCEL"      => "https://nelichan.tk/donate.php",
        "VK_DATETIME"    => $timezone,
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
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:3480/project/5bd46ccb6d4513228f8c2bb7?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:3480/project/5bd46ccb6d4513228f8c2bb7?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2018-11-04T16:52:32+0000 */

/* $data = "0041011003008005uid1300512345003150003EUR020EE152200221234567897009ÕIE MÄGER0071234561011Torso Tiger077http://142.93.99.88:3480/project/5bd46ccb6d4513228f8c2bb7?payment_action=success076http://localhost:3480/project/5bd46ccb6d4513228f8c2bb7?payment_action=cancel0242018-11-04T16:52:32+0000"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* xfGYv5Ju6uDfdPofW12S/DtYLEp6jI6c1U2aD/m4nGpGwzlymz3X612rAThDmQm4RbA0IW6FvB8Ura0xKar5D4QI6Bzo1zCBdfOzfhgOElkNf1CYEZaeurAb35ZffZSwO2bZZrUi8wDjXCupUnVls3GM7so3CXae4OGCp9YndGuQD1TGOaMp5zukphGAffQ64Jkn+K8ODUFGZbLd4hxmT4cKGR3vXY1XxWF4fxEb/+iFq5/7kePN8FopfsTJFj+oUGnDfadgcrq680h1r/MKLgLliQ3NRXafcCT6vTyW8vzbwtecLtRS9Iown7PndWk5JLRzKy1P7g0oheJl7vGNHA== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>
        <form id="don" method="post" action="http://142.93.99.88:3480/banklink/swedbank">
            <!-- include all values as hidden form fields -->
			<?php foreach($fields as $key => $val):?>
				<input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
			<?php endforeach; ?>

        </form>
		
		<script>document.getElementById('don').submit();</script>