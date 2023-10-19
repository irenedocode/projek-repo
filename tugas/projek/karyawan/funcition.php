<?php

$koneksi = mysqli_connect("localhost","root","","login");

//login

if(isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    $cekuser = mysqli_query($koneksi,"select * from user where username= '$username' and password='$password'");
    $hitung = mysqli_num_rows($cekuser);

    if($hitung>0) {
        //kalau temu
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];

        if($role=='direktur') {
            //kalau direktur
            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = 'direktur';
            header('location:direktur');

        } elseif ($role=='manager') {
            //kalau manager
            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = 'manager';
            header('location:manager');

        }

        elseif ($role=='cs') {
            //kalau manager
            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = 'cs';
            header('location:cs');

        }

        elseif ($role=='kasir') {
            //kalau manager
            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = 'kasir';
            header('location:kasir');

        }
          else {
        //kalau manager
        $_SESSION['log'] = 'logged';
        $_SESSION['role'] = 'akuntan';
        header('location:akuntan');

    }


        } else {
            
            echo 'tidak ada';

        }
    };






?>