<?php

$navn = '';
$mail = '';
$emne = '';
$besked = '';
$fejlnavn = '';
$fejlmail = '';
$fejlemne = '';
$fejlbesked = '';
$fejl = 0;
$success = 'Indtast dine oplysninger i kontaktformularen herunder!';



if( $_POST ) 
{
    if (empty($_POST["navn"])) {
    $fejlnavn = "Du skal indtaste dit navn";
    $fejl++;
  } else {
    $navn = test_input($_POST["navn"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$navn)) {
      $fejlnavn = "Du må kun indtaste bogstaver og mellemrum"; 
      $fejl++;
    }
  }

    if (empty($_POST['mail'])) {
    $fejlmail = "Mail - Feltet er ikke udfyldt";
    $fejl++;
  } else {
    $mail = test_input($_POST['mail']);
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $fejlmail = "Mail - Ugyldig Email";
      $fejl++; 
    }
  } 

    if( isset( $_POST['emne'] ) )
    {
        if (empty( $_POST['emne']))
        {
            $fejlemne = "Emne - Feltet er ikke udfyldt!";
            $fejl++;
        }
        else
        {
            if (is_numeric ( $_POST['emne']))
            {
                $fejlemne = "Emne - Feltet skal udfyldes med bogstaver!";
                $fejl++;
            }
            else
            {
                $emne = $_POST['emne'];
            }
        }
    }

    if( isset( $_POST['besked'] ) )
    {
        if (empty( $_POST['besked']))
        {
            $fejlbesked = "Besked - Feltet er ikke udfyldt!";
            $fejl++;
        }
        else
        {
            $besked = $_POST['besked'];
        }
    }

    if ( $fejl == 0 )
    {
        $navn = '';
        $mail = '';
        $emne = '';
        $besked = '';
        $success = "Formularen er udfyldt korrekt!";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><?php echo $success; ?></p>

<form action="" method="post">
    <label>Navn:</label>
    <input type="text" name="navn" value="<?php echo $navn; ?>" >
    <p><?php echo $fejlnavn; ?></p>

    <label>E-mail:</label>
    <input type="text" name="mail" value="<?php echo $mail; ?>" >
    <p><?php echo $fejlmail; ?></p>

    <label>Emne</label>
    <input type="text" name="emne" value="<?php echo $emne; ?>" >
    <p><?php echo $fejlemne; ?></p>

    <label>Besked:</label>
    <textarea name="besked" cols="20" rows="10"></textarea>
    <p><?php echo $fejlbesked; ?></p>

    <input type="submit" value="Submit"/>

</form>