<?php
require_once('config.php');
require_once('user.php');

$guest = new Guest($conn); 
$guest->Addguest();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">

    <title>Gastenboek</title>
</head>
<body>
<?php
    if(isset($_SESSION['success']))
{?>
<div class="alert">
    <?php echo $_SESSION['success'] ?>
</div>
<?php
    unset($_SESSION['success']);
}
?>
    <section>
        <h1 class="title">Gastenboek</h1>
        <form action="" id="form" name="guestForm" method="post">
            <div class="flex">
                <div>
                    <label>Naam</label><br>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>E-mailadres</label><br>
                    <input type="email" name="email"><br>
                </div>
            </div>
            <label>Bericht</label><br>
            <textarea name="message" id="message" cols="20" rows="5"></textarea><br>
            <input type="submit" name="submit" id="submit" value="Verstuur">
        </form>
    </section>
    <section id="messages">
        <?php echo $guest->getGoals(); ?>
    </section>

<script>
    Validate();

    function Validate()
    {
        document.querySelector("#form").addEventListener("submit", function(e){
            console.log(e);
            if(document.guestForm.name.value == "")
            {
                document.guestForm.name.style.border = "1px solid red"
                e.preventDefault()
            }else{
                document.guestForm.name.style.border = "1px solid black"
            }  
            if(document.guestForm.email.value == "")
            {
                document.guestForm.email.style.border = "1px solid red"
                e.preventDefault()
            }else{
                document.guestForm.email.style.border = "1px solid black"
            } 
            if(document.guestForm.message.value == "")
            {
                document.guestForm.message.style.border = "1px solid red"
                e.preventDefault()
            }else{
                document.guestForm.message.style.border = "1px solid black"
            }  
        })
    }
</script>
</body>
</html>