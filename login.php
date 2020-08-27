<meta charset="UTF-8">
<?php
$conn = mysqli_connect("localhost","root","9798") ;
$dbname="movie";

mysqli_select_db($conn,$dbname); //데이터베이스 연결
mysqli_query($conn,"set names utf8");



if(mysqli_connect_errno()){ //연결실패시
   echo "MySQL로의 연결에 실패했습니다.:".mysqli_connect_error();
}

$sql="SELECT * from USER_INFO where USER_ID='".$_POST["id"]."' AND USER_PASSWORD='".$_POST['password']."'";


$qresult = mysqli_query($conn, $sql);
$qarray = mysqli_fetch_assoc($qresult); 



if(!empty($qarray)){ 
  session_start();
  $_SESSION['user_id'] = $_POST["id"];
  $_SESSION['user_name'] = $qarray['USER_NAME'];
  echo "<script>alert('$qarray[USER_NAME]님 로그인 되었습니다.');
    location.href=('select_menu.php');
    </script>";  
}
else{
   echo "<script>alert('아이디와 비밀번호를 확인해 주세요.');
    location.href=('LOGIN_SCREEN.php');
    </script>"; //정보가 없다면, 다시 로그인화면으로 돌아간다.
}


mysqli_close($conn);
?>
