<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact us anytime</h1>
    <form action="" method="post" class="d-flex flex-column">
        @csrf
        <input type="text" name="name" placeholder="Enter Your Name" id="">
        <input type="text" name="email" placeholder="Enter Your Email" id="">
        <textarea name="message" placeholder="Your Query" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>