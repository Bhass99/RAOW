<?php

class Guest
{

    public function __construct($db)
    {
       $this->db = $db;
    }
   
    public function Addguest()
    {
        if(isset($_POST['submit'])){
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $message = $_POST['message'] ?? null;
            $date =  date("Y/m/d");

            $sql = "INSERT INTO guests (name,email,message,created_at) VALUES (?,?,?,?)";
            $stmt= $this->db->prepare($sql);
            $stmt->execute([$name, $email, $message,$date]);

            $_SESSION['success'] = 'Gast is toegevoegd';
        }
    }

    public function getGoals()
    {
        $html = "";
        $stmt = $this->db->query("SELECT * FROM guests ORDER BY created_at DESC")->fetchAll();
        foreach ($stmt as $row) {
            $html .= '
                
                <div class="message_cred">
                    <h4> ' . $row["name"] . ' </h4>
                    <div class="flex">
                        <p> ' . $row["created_at"] . '</p> &nbsp&nbsp
                        <p><a href="mailto: '. $row['email'] .'">Stuur e-mail</a></p> 
                    </div>
                </div>
                <div class="message">
                    <p> ' . $row["message"] . '</p>
                </div>
            ';
        }

        return $html;
    }

   
}
