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
    if( isset( $_POST['navn'] ) )
    {
        if (empty( $_POST['navn']))
        {
            $fejlnavn = "Navn - Feltet er ikke udfyldt!";
            $fejl++;
        }
        else
        {
            if (is_numeric ( $_POST['navn']))
            {
                $fejlnavn = "Navn - Feltet skal udfyldes med bogstaver!";
                $fejl++;
            }
            else
            {
                $navn = $_POST['navn'];
            }
        }
    }

    if( isset( $_POST['mail'] ) )
    {
        if (empty( $_POST['mail']))
        {
            $fejlmail = "Mail - Feltet er ikke udfyldt!";
            $fejl++;
        }
        else
        {
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL) === false )
            {
                $fejlmail = "Mail - Din mail er ikke gyldig!";
                $fejl++;
            }
            else 
            {
                $mail = $_POST['mail'];
            }
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
            if (strlen($besked) > 2 )
            {
                $fejlbesked = "Besked - din besked er for kort!";
                $fejl++;
            }
            else 
            {
                $besked = $_POST['besked'];
            }
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
?>

<p><?php echo $success; ?></p>

<form action="" method="post">
    <label>Navn:</label>
    <input type="text" name="navn" value="<?php echo $navn; ?>"
    <p><?php echo $fejlnavn; ?></p>

    <label>E-mail:</label>
    <input type="text" name="mail" value="<?php echo $mail; ?>"
    <p><?php echo $fejlmail; ?></p>

    <label>Emne</label>
    <input type="text" name="emne" value="<?php echo $emne; ?>"
    <p><?php echo $fejlemne; ?></p>

    <label>Besked:</label>
    <textarea name="besked" cols="20" rows="10"></textarea>
    <p><?php echo $fejlbesked; ?></p>

    <input type="submit" value="Submit"/>
</form>