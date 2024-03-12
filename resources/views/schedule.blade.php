<!DOCTYPE html>
<html>
<head>
    <title>Personal Information Form</title>
</head>
<body>
    <form action="/schedule" method="post">
        @csrf
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="date">Date:</label><br>
        <input type="date" name="date"><br>
        <label for="time">Start Time:</label><br>
        <input type="time" name="start_time"><br>
        <label for="time">End Time:</label><br>
        <input type="time" name="end_time"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>