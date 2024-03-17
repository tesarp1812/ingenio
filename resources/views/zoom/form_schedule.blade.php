<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>

<body>

    <form action="/form_schedule/input" method="POST">
        @csrf
        <label for="">user</label>
        <input type="text" name="inputUser" value="1"><br>

        <label for="">Region</label>
        <select name="inputRegion" id="">
            <option value="1">Malang</option>
            <option value="2">Surabaya</option>
            <option value="3">Bali</option>
            <option value="4">Jakarta</option>
        </select><br>

        <label for="">Apakah Online</label>
        <select name="inputIsOnline" id="">
            <option value="true">Iya</option>
            <option value="false">Tidak, kelas offline</option>
        </select><br>

        <label for="">Tipe Aktifitas</label>
        <input type="text" name="inputActivityType" value="1"><br>

        <label for="">Nama Kelas</label>
        <input type="text" name="inputClass"><br>

        <label for="">Tanggal</label>
        <input type="date" name="inputStartDate"><br>

        <label for="">Jam Mulai</label>
        <input type="time" name="inputStartTime"><br>

        <label for="">Jam Selesai</label>
        <input type="time" name="inputEndTime"><br>

        <label for="">Nomer Whatsapps</label>
        <input type="number" name="inputWA"><br>

        <input type="number" name="inputIdZoom" value="1"><br>
        <input type="number" name="inputLogin" value="1"><br>
        <input type="number" name="inputHost" value="1"><br>

        <button type="submit" >Input</button>
    </form>




</body>

</html>
