<html>
    <head>
        <style>
        .error {color: #FF0000;}
        </style>
        </head>
 
        <body>
            <?php
            // define variables and set to empty values
            $namaErr = $nimErr = $emailErr = $genderErr = $websiteErr = $kampusErr = $fakultasErr = $prodiErr = "";
            $nama = $nim = $email = $gender = $comment = $website = $kampus = $fakultas = $prodi = "";
 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (empty($_POST["nama"])) {
                    $namaErr = "Nama harus diisi";
                }else {
                    $nama = test_input($_POST["nama"]);
                }

                if (empty($_POST["nim"])) {
                    $nimErr = "nim harus diisi";
                }else {
                    $nim = test_input($_POST["nim"]);
                }
                
                if (empty($_POST["email"])) {
                    $emailErr = "Email harus diisi";
                }else {
                    $email = test_input($_POST["email"]);
 

                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Email tidak sesuai format"; 
                    }
                }
 
                if (empty($_POST["website"])) {
                    $website = "";
                }else {
                    $website = test_input($_POST["website"]);
                }
 

                if (empty($_POST["komentar"])) {
                    $comment = "";
                }else {
                    $comment = test_input($_POST["komentar"]);
                }
 
                if (empty($_POST["gender"])) {
                    $genderErr = "Gender harus dipilih";
                }else {
                    $gender = test_input($_POST["gender"]);
                }

                if (empty($_POST["kampus"])) {
                    $kampusErr = "Kampus harus diisi";
                }else {
                    $kampus = test_input($_POST["kampus"]);
                }

                if (empty($_POST["fakultas"])) {
                    $fakultasErr = "Fakultas harus diisi";
                }else {
                    $fakultas = test_input($_POST["fakultas"]);
                }

                if (empty($_POST["prodi"])) {
                    $prodiErr = "Prodi harus diisi";
                }else {
                    $prodi = test_input($_POST["prodi"]);
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            
            <h2>VALIDASI DATA MAHASISWA </h2>
            
            <p><span class = "error">* Harus Diisi.</span></p>
            <form method = "post" action = "<?php 
            echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table>
                <tr>
                    <td>Kampus:</td>
                    <td><input type = "text" name = "kampus">
                    <span class = "error">* <?php echo $kampusErr;?></span>
                </td>
            </tr>

                <tr>
                    <td>Nama:</td>
                    <td><input type = "text" name = "nama">
                    <span class = "error">* <?php echo $namaErr;?></span>
                </td>
            </tr>

                <tr>
                    <td>NIM:</td>
                    <td><input type = "text" name = "nim">
                    <span class = "error">* <?php echo $nimErr;?></span>
                </td>
            </tr>

            <tr>
                    <td>Fakultas:</td>
                    <td><input type = "text" name = "fakultas">
                    <span class = "error">* <?php echo $fakultasErr;?></span>
                </td>
            </tr>

            <tr>
                    <td>Prodi:</td>
                    <td><input type = "text" name = "prodi">
                    <span class = "error">* <?php echo $prodiErr;?></span>
                </td>
            </tr>
            
            <tr>
                <td>E-mail: </td>
                <td><input type = "text" name = "email">
                <span class = "error">* <?php echo $emailErr;?></span>
            </td>
        </tr>
        
        <tr>
            <td>Website:</td>
            <td> <input type = "text" name = "website">
            <span class = "error"><?php echo $websiteErr;?></span>
        </td>
    </tr>
    
    <tr>
        <td>Komentar:</td>
        <td> <textarea name = "komentar" rows = "5" cols = "40"></textarea></td>
    </tr>
    
    <tr>
        <td>Jenis Kelamin:</td>
        <td>
            <input type = "radio" name = "gender" value = "L">Laki-Laki
            <input type = "radio" name = "gender" value = "P">Perempuan
            <span class = "error">* <?php echo $genderErr;?></span>
        </td>
    </tr>
    <td>
        <input type = "submit" name = "submit" value = "Submit"> 
    </td>
</table>
</form>
<h2> Data yang anda isi : </h2>
<table width='80%' border=1>
    <tr>
    <th>KAMPUS</th> <th>NAMA</th> <th>NIM</th> <th>FAKULTAS</th> <th>PRODI</th> <th>Jenis Kelamin</th> <th>Email</th> <th>WEBSITE</th> <th>KOMENTAR</th> 
    </tr>
    <?php 
    echo "<tr>";
    echo "<td>".$kampus."</td>";
    echo "<td>".$nama."</td>";
    echo "<td>".$nim."</td>";
    echo "<td>".$fakultas."</td>";
    echo "<td>".$prodi."</td>";
    echo "<td>".$gender."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$website."</td>";
    echo "<td>".$comment."</td>"; 
    ?>
    </table>
</body>
</html>