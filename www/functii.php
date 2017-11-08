<?php
function verifica($conn, $tabel, $camp, $valoare){
	$result = $conn->query("SELECT * FROM `$tabel` WHERE $camp = '$valoare'");
	if ($result->fetchColumn() > 0) {
		return 1;
	}
	else{
		return 0;
	}
}
function verifica2($conn, $tabel, $camp, $valoare, $camp2, $valoare2){
	$result = $conn->query("SELECT * FROM `$tabel` WHERE $camp = '$valoare' AND $camp2 = '$valoare2'");
	if ($result->fetchColumn() > 0) {
		return 1;
	}
	else{
		return 0;
	}
}
function modifica($conn, $tabel, $camp, $valoare, $cond, $valcond){
	$sql = "UPDATE $tabel SET ".$camp." = '$valoare' WHERE ".$cond." = '$valcond'";
	$stmt = $conn->prepare($sql);
	if($stmt->execute()){
		return 1;
	}
}
function inserare($conn, $tabel, $campuri, $valori){
	//tipar valori $valori ="'".$exemplu."', '".$exemplu."', '".$exemplu."'";
	$sql = "INSERT INTO ".$tabel." (".$campuri.") VALUES (".$valori.")";
	$stmt = $conn->prepare($sql);
	if($stmt->execute()){
		return 1;
	}
}
function update($conn, $tabel, $camp, $valoare, $cond, $valcond){
	$sql = "UPDATE $tabel SET ".$camp." = '$valoare' WHERE ".$cond." = '$valcond'";
	$stmt = $conn->prepare($sql);
	if($stmt->execute()){
		return 1;
	}
}
function selectare($conn, $tabel, $camp, $cond, $valcond){
	$sql ="SELECT $camp FROM ".$tabel." WHERE $cond ='".$valcond."'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	return $result[$camp];
}
function trimitere_email_resetparola($user_email, $reset_password){
        $mail = new PHPMailer;
        if (EMAIL_USE_SMTP) {
            $mail->IsSMTP();
            $mail->SMTPAuth = EMAIL_SMTP_AUTH;
            if (defined(EMAIL_SMTP_ENCRYPTION)) {
                $mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
            }
            $mail->Host = EMAIL_SMTP_HOST;
            $mail->Username = EMAIL_SMTP_USERNAME;
            $mail->Password = EMAIL_SMTP_PASSWORD;
            $mail->Port = EMAIL_SMTP_PORT;
        } else {
            $mail->IsMail();
        }
        $mail->From = EMAIL_PASSWORDRESET_FROM;
        $mail->FromName = EMAIL_PASSWORDRESET_FROM_NAME;
        $mail->AddAddress($user_email);
        $mail->Subject = EMAIL_PASSWORDRESET_SUBJECT;
        $mail->Body = EMAIL_PASSWORDRESET_CONTENT . ' ' . $reset_password;

        if(!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }
?>