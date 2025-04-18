<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrda</title>
    <link rel="icon" href="logo/medsup.png" type="image/png">
    <link rel="stylesheet" href="css/empty.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

<?php
//BAZA PODATAKA----------------------------------------------------------------BAZA PODATAKA//
include 'baza.php';

$tdo ='<td>';
$tdc ='</td>';
$tro ='<tr>';
$trc ='</tr>';


$sqlop = "SELECT id, kod, naziv, cena FROM opsti_materijal";
$resultop = $conn->query($sqlop);

if ($resultop->num_rows > 0) { 
    $dataop = [];
    while ($rowop = $resultop->fetch_assoc()) {
        $dataop[] = $rowop;
    } 
}


$sqlhm = "SELECT id, kod, naziv, cena FROM hiruski_materijali";
$resulthm = $conn->query($sqlhm);

if ($resulthm->num_rows > 0) { 
    $datahm = [];
    while ($rowhm = $resulthm->fetch_assoc()) {
        $datahm[] = $rowhm;
    } 
}


$sqlum = "SELECT id, kod, naziv, cena FROM ugradni_materijali";
$resultum = $conn->query($sqlum);

if ($resultum->num_rows > 0) { 
    $dataum = [];
    while ($rowum = $resultum->fetch_assoc()) {
        $dataum[] = $rowum;
    } 
}


$sqld = "SELECT id, kod, naziv, cena FROM dezinfekcija";
$resultd = $conn->query($sqld);

if ($resultd->num_rows > 0) { 
    $datad = [];
    while ($rowd = $resultd->fetch_assoc()) {
        $datad[] = $rowd;
    } 
}


$sqll = "SELECT id, kod, naziv, cena FROM lekovi";
$resultl = $conn->query($sqll);

if ($resultl->num_rows > 0) { 
    $datal = [];
    while ($rowl = $resultl->fetch_assoc()) {
        $datal[] = $rowl;
    } 
}
$conn->close();
?>

<!--TABELA-----------------------------------------------------------------------------------TABELA-->
<div id="hjedanz"><h1>Hvala Vam na porudžbini !</h1></div>
<div id="divz"><img src="logo/banerlogo.png" alt="baner"></div>

<table id="podz">
    <th colspan="4">PORUDŽBINA</th>
    <tr>
        <td id="kodz">KOD</td>
        <td id="nazivz">NAZIV</td>
        <td id="kolicinaz">KOLIČINA</td>
        <td id="cenaz">CENA</td>
    </tr>
    <?php
        $opcena = 0;
        $hmcena = 0;
        $umcena = 0;
        $dcena = 0;
        $lcena = 0;
        $broj_inputaop = count($dataop);
        $broj_inputahm = count($datahm);
        $broj_inputaum = count($dataum);
        $broj_inputad = count($datad);
        $broj_inputal = count($datal);

        
            for($i=1;$i<=$broj_inputaop;$i++){ 
                $ime_inputa = "OP".$i;
                if (!empty($_POST[$ime_inputa])) {
                    echo $tro;
                    for($j = 0; $j < count($dataop); $j++){
                        $label = $_POST['lop'.$i];
                        $kol = $_POST['OP'.$i];
                        if($dataop[$j]['kod'] == $label){                   
                            echo "<td class='centarz'>";
                            echo $dataop[$j]['kod'];
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $dataop[$j]['naziv'];
                            echo $tdc;
                            echo "<td class='centarz'>";
                            echo $kol;
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $suma = $dataop[$j]['cena'] * $kol.".00 RSD";
                            echo $tdc;
                            $opcena = $dataop[$j]['cena'] * $kol + $opcena;          
                        }                            
                    }
                    echo $trc;    
                }  
            }

            for($i=1;$i<=$broj_inputad;$i++){ 
                $ime_inputad = "D".$i;
                if (!empty($_POST[$ime_inputad])) {
                    echo $tro;
                    for($j = 0; $j < count($datad); $j++){
                        $labeld = $_POST['ld'.$i];
                        $kold = $_POST['D'.$i];
                        if($datad[$j]['kod'] == $labeld){                   
                            echo "<td class='centarz'>";
                            echo $datad[$j]['kod'];
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $datad[$j]['naziv'];
                            echo $tdc;
                            echo "<td class='centarz'>";
                            echo $kold;
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $sumad = $datad[$j]['cena'] * $kold.".00 RSD";
                            echo $tdc;
                            $dcena = $datad[$j]['cena'] * $kold + $dcena;          
                        }                            
                    }
                    echo $trc;    
                }  
            }

            for($i=1;$i<=$broj_inputaum;$i++){ 
                $ime_inputaum = "UM".$i;
                if (!empty($_POST[$ime_inputaum])) {
                    echo $tro;
                    for($j = 0; $j < count($dataum); $j++){
                        $labelum = $_POST['lum'.$i];
                        $kolum = $_POST['UM'.$i];
                        if($dataum[$j]['kod'] == $labelum){                   
                            echo "<td class='centarz'>";
                            echo $dataum[$j]['kod'];
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $dataum[$j]['naziv'];
                            echo $tdc;
                            echo "<td class='centarz'>";
                            echo $kolum;
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $suma = $dataum[$j]['cena'] * $kolum.".00 RSD";
                            echo $tdc;
                            $umcena = $dataum[$j]['cena'] * $kolum + $umcena;          
                        }                            
                    }
                    echo $trc;    
                }  
            }

            for($i=1;$i<=$broj_inputahm;$i++){ 
                $ime_inputahm = "HM".$i;
                if (!empty($_POST[$ime_inputahm])) {
                    echo $tro;
                    for($j = 0; $j < count($datahm); $j++){
                        $labelhm = $_POST['lhm'.$i];
                        $kolhm = $_POST['HM'.$i];
                        if($datahm[$j]['kod'] == $labelhm){                   
                            echo "<td class='centarz'>";
                            echo $datahm[$j]['kod'];
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $datahm[$j]['naziv'];
                            echo $tdc;
                            echo "<td class='centarz'>";
                            echo $kolhm;
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $sumahm = $datahm[$j]['cena'] * $kolhm.".00 RSD";
                            echo $tdc;
                            $hmcena = $datahm[$j]['cena'] * $kolhm + $hmcena;          
                        }                            
                    }
                    echo $trc;    
                }  
            }

            for($i=1;$i<=$broj_inputal;$i++){ 
                $ime_inputal = "L".$i;
                if (!empty($_POST[$ime_inputal])) {
                    echo $tro;
                    for($j = 0; $j < count($datal); $j++){
                        $labell = $_POST['ll'.$i];
                        $koll = $_POST['L'.$i];
                        if($datal[$j]['kod'] == $labell){                   
                            echo "<td class='centarz'>";
                            echo $datal[$j]['kod'];
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $datal[$j]['naziv'];
                            echo $tdc;
                            echo "<td class='centarz'>";
                            echo $koll;
                            echo $tdc;
                            echo "<td class='levoz'>";
                            echo $sumal = $datal[$j]['cena'] * $koll.".00 RSD";
                            echo $tdc;
                            $lcena = $datal[$j]['cena'] * $koll + $lcena;          
                        }                            
                    }
                    echo $trc;    
                }  
            }
            $sumasuma = $opcena + $hmcena + $umcena + $dcena + $lcena;
        
    ?>
    

    <tr>
    <td colspan="2"></td>
    <td><?php echo 'UKUPNO'?></td>
    <td style='color:red'><?php echo $sumasuma.".00 RSD" ?></td>
    </tr>
</table>

<div id="vremez"><h3>Vreme porudžbine<?php echo date(" H:i:s");?></h3></div>

<div id="bcentarz"><a href="index.html"><button id="dugmez">Početna strana</button></a></div>
<?php
//MAIL----------------------------------------------------------------------------------------MAIL//
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mailkupca = $_POST['email'];

try {
    // Server settings
    $mail->isSMTP();                                    // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';               // Set the SMTP server
    $mail->SMTPAuth   = true;                           // Enable SMTP authentication
    $mail->Username   = 'medsup0123@gmail.com';         // SMTP username
    $mail->Password   = 'ywbo okih cgdo wbwt';          // SMTP password (use an app password if 2FA is enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port       = 587;                            // TCP port to connect to

    // Recipients
    $mail->setFrom('medsup0123@gmail.com', 'MedSup');
    $mail->addAddress($mailkupca, 'Poštovani/la');

    // Content
    $mail->isHTML(true);                                // Set email format to HTML
    $mail->Subject = 'Hvala Vam na kupovini!';
    $mail->Body    = '
    Poštovani/a,<br>
    <br>
    Zahvaljujemo se što ste odabrali našu prodavnicu za vašu kupovinu!<br>
    <br>
    Vaša porudžbina uspešno je primljena i trenutno je u obradi. Očekujte da će vaša roba 
    biti spremna za isporuku u najkraćem mogućem roku. O svim daljim koracima i detaljima dostave 
    bićete obavešteni putem ovog e-maila.<br>
    <br>
    Ukoliko imate bilo kakvih pitanja ili želite dodatne informacije o vašoj porudžbini, 
    slobodno nas kontaktirajte na prodaja@medsupshop.com ili 061 1 11 11 11.<br>
    <br>
    Hvala vam još jednom što verujete našem timu i nadamo se da ćete uživati u svojoj kupovini!<br>
    <br>
    Srdačno,<br>
    Tim MedSup<br>
    www.medsup.rs<br>';
    $mail->AltBody = '';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
</body>

</html>

