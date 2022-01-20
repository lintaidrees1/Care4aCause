<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/css/styles.css">
    <title>Care4aCause -Contact</title>
</head>

<body>

    <section class="contact">
        <a href="index.php" class="text-light"><i class="p-2 fa fa-arrow-left" aria-hidden="true"></i>Back</a>
        <div class="content">
            <h2>
                Contact Us
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. assumenda minimndis, eligendi quae

            </p>
        </div>
        <div class="contact-container">
            <div class="contactinfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>
                            4671 Sugar Camp Road,<br>Owatonna, Minnesota,<br>55060
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>
                            090078601
                        </p>
                    </div>
                </div>
                <br><br>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>
                            donate@care4acause.org.pk
                        </p>
                    </div>
                </div>
            </div>
            <div class="contactform">
                <?php
                $obj = new database();
                if (isset($_POST['submit'])) {

                    $message =  trim($_POST['message']);

                    $show = $obj->insert('contactus', [
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'subject' => $_POST['subject'],
                        'message' => $message
                    ]);
                    if ($show) {
                        echo "Message Sent Successfully";
                    }
                }
                ?>
                <form action="contactus.php" method="POST">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="subject" required>
                        <span>Subject</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" rows="1" required></textarea>
                        <span>Type your message here</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>