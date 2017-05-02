<?php
$dbhost  = 'localhost';
$dbuser  = 'root';
$dbpass  = '';
$connect = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$connect) {
    die('SERVER CONNECTION FAILED...\n: ' . mysql_error());
}
$db = "CREATE DATABASE IF NOT EXISTS attendence";// Create database,only creates if DB does not exist
$retval = mysql_query($db, $connect);
if (!$retval) {
    die('DATABASE CREATION FAILED\n: ' . mysql_error());
}
mysql_select_db('attendence');//select database
$sql="CREATE TABLE IF NOT EXISTS teacher(
          name varchar(50),
          email varchar(50) PRIMARY KEY,
          pass varchar(30),
          mobile varchar(10),
          regyear int(5) ,
          stream varchar(10),
          section varchar(5)
          )";
$retval = mysql_query($sql, $connect);
if (!$retval) {
    die('COULD NOT CREATE TABLE\n: ' . mysql_error());
}
$sql="CREATE TABLE IF NOT EXISTS student(
          name varchar(30) ,
          email varchar(30) PRIMARY KEY,
          registration bigint(15) UNIQUE,
          regyear int(5) ,
          stream varchar(10),
          section varchar(5),
          roll int(3) ,
          password varchar(30),
          UNIQUE (regyear,stream,section,roll)
          )";
$retval = mysql_query($sql, $connect);
if (!$retval) {
    die('COULD NOT CREATE TABLE\n: ' . mysql_error());
}

$sql="CREATE TABLE IF NOT EXISTS attendence(
          sname varchar(50),
          semail varchar(50),
          stream varchar(10),
          regyear varchar(10),
          section varchar(5),
          roll int(3),
          date date,
          present varchar(5),
          tclass int(10),
          pclass int(10),
          primary key(sname,date,present),
          FOREIGN KEY (semail) REFERENCES student(email)
          )";
$retval = mysql_query($sql, $connect);
if (!$retval) {
    die('COULD NOT CREATE TABLE\n: ' . mysql_error());
}
$sql="CREATE TABLE IF NOT EXISTS subject(
      paper_name varchar(50),
      paper_code varchar(20) PRIMARY KEY,
      stream varchar(20),
      year varchar(5))";
$retval = mysql_query($sql, $connect);
if (!$retval) {
    die('COULD NOT CREATE TABLE\n: ' . mysql_error());
}
$sql="CREATE TABLE IF NOT EXISTS question(
      q_id varchar(100),
      paper_code varchar(20),
      section varchar(10),
      date date,
      time time,
      duration varchar(10),
      question varchar(1000),
      option1 varchar(100),
      option2 varchar(100),
      option3 varchar(100),
      option4 varchar(100),
      c_option varchar(50),
      PRIMARY KEY(q_id),
      FOREIGN KEY (paper_code) REFERENCES subject(paper_code)  
       )";  
$retval = mysql_query($sql, $connect);
if (!$retval) {
    die('COULD NOT CREATE TABLE\n: ' . mysql_error());
}    
?>