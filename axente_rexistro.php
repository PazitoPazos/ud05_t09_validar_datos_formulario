<?php
    header('Content-Type: text/html; charset=UTF-8');
    echo "<pre>"; print_r($_REQUEST); echo "</pre>";

    $nomeCompleto=htmlspecialchars(trim(strip_tags($_REQUEST['nomeCompleto'])),ENT_QUOTES, "ISO-8859-1");
    if ($nomeCompleto == "")
        print "<p>O campo nome completo está baleiro.</p>";
    else
        print "<p>O valor recibido do campo nome completo é: $nomeCompleto</p>";

    $nomeUsr=htmlspecialchars(trim(strip_tags($_REQUEST['nomeUsr'])),ENT_QUOTES, "ISO-8859-1");
    if ($nomeUsr == "")
        print "<p>O campo nome de usuario está baleiro.</p>";
    else
        print "<p>O valor recibido do campo nome de usuario é: $nomeUsr</p>";

    $contrasinal=htmlspecialchars(trim(strip_tags($_REQUEST['contrasinal'])),ENT_QUOTES, "ISO-8859-1");
    if ($contrasinal == "") {
        print "<p>O campo nome contrasinal está baleiro.</p>";
    } elseif (strlen($contrasinal) < 6 ) {
        print '<p style="color:red">O campo nome contrasinal debe ter 6 carácteres ou máis.</p>';
    } else {
        print "<p>O valor recibido do campo contrasinal é: $contrasinal</p>";
    };
    
    $idade=htmlspecialchars(trim(strip_tags($_REQUEST['idade'])),ENT_QUOTES, "ISO-8859-1");
    if ($idade == "") {
        print "<p>O campo idade está baleiro.</p>";
    } elseif ($idade < 0 || $idade > 130 ) {
        print '<p style="color:red">O campo nome idade debe ser un número enteiro [0-130].</p>';
    } else {
        print "<p>O valor recibido do campo idade é: $idade</p>";
    }

    $dNac=htmlspecialchars(trim(strip_tags($_REQUEST['dNac'])),ENT_QUOTES, "ISO-8859-1");
    if ($dNac == "") {
        print "<p>O campo dNac está baleiro.</p>";
    } elseif (!preg_match("~^([0-2][0-9]|3[01])\/(0[0-9]|1[0-2])\/(19[0-9][0-9]|20[0-9][0-9])$~",$dNac)) {
        print '<p style="color:red">O campo nome data de nacemento debe ter o formato [dd/mm/yyyy] e de rango [01/01/1900-31/12/2099].</p>';
    } else {
        print "<p>O valor recibido do campo data de nacemento é: $dNac</p>";
    }

    $email=htmlspecialchars(trim(strip_tags($_REQUEST['email'])),ENT_QUOTES, "ISO-8859-1");
    if ($email == "") {
        print "<p>O campo email está baleiro.</p>";
    } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        print '<p style="color:red">O campo nome email non é valido.</p>';
    } else {
        print "<p>O valor recibido do campo email é: $email</p>";
    }

    $url=htmlspecialchars(trim(strip_tags($_REQUEST['url'])),ENT_QUOTES, "ISO-8859-1");
    if ($url == "") {
        print "<p>O campo URL da páxina persoal está baleiro.</p>";
    } elseif (!filter_var($url,FILTER_VALIDATE_URL)) {
        print '<p style="color:red">O campo nome email non é valido.</p>';
    } else {
        print "<p>O valor recibido do campo URL da páxina persoal é: $url</p>";
    }

    $ip=htmlspecialchars(trim(strip_tags($_REQUEST['ip'])),ENT_QUOTES, "ISO-8859-1");
    if ($ip == "") {
        print "<p>O campo IP do equipo está baleiro.</p>";
    } elseif (!filter_var($ip,FILTER_VALIDATE_IP)) {
        print '<p style="color:red">O campo nome IP non é valido.</p>';
    } else {
        print "<p>O valor recibido do campo IP do equipo é: $ip</p>";
    }

    $hobbies=htmlspecialchars(trim(strip_tags($_REQUEST['hobbies'])),ENT_QUOTES, "ISO-8859-1");
    if ($hobbies == "")
        print "<p>O campo descriión dos hobbies está baleiro.</p>";
    else
        print "<p>O valor recibido do campo descrición dos hobbies é: $hobbies</p>";

    $rcbInfo=(isset($_REQUEST['rcbInfo'])) ? htmlspecialchars(trim(strip_tags($_REQUEST['rcbInfo'])),ENT_QUOTES, "ISO-8859-1"):"";
    if ($rcbInfo == "")
        print "<p>Non se utilizou o control recibir información.</p>";
    else
        print "<p>O valor recibido do control recibir información é: $rcbInfo</p>";

    $sexo=(isset($_REQUEST['sexo'])) ? htmlspecialchars(trim(strip_tags($_REQUEST['sexo'])),ENT_QUOTES, "ISO-8859-1"):"";
    if ($sexo == "")
        print "<p>Non se utilizou o control sexo.</p>";
    else
        print "<p>O valor recibido do control sexo é: $sexo</p>";

    $linguasEs=(isset($_REQUEST['linguasEs'])) ? $_REQUEST['linguasEs']:"";
    if ($linguasEs == "")
        print "<p>Non se utilizou o control linguas estranxeiras.</p>";
    else {
        echo "<p>Os valores recibidos do menú linguas estranxeiras son: <pre>";
        print_r($linguasEs);
        echo "</pre>";
    }

    $curriculo=(isset($_FILES['curriculo'])) ? $_FILES['curriculo']:"";
    if ($curriculo == "") {
        print "<p>Non se utilizou o control currículo.</p>";
    } else {
        echo "<p>O nome e o tamaño do arquivo recibido no campo currículo son: ".$curriculo["name"]." e ".$curriculo["size"]." bytes</p";
        move_uploaded_file($curriculo["tmp_name"], "subidos/".$curriculo["name"]);
    }
?>