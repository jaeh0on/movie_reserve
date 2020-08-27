<meta charset="UTF-8">
<?php
$conn = mysqli_connect("localhost","root","9798") ;
$dbname="movie";

mysqli_select_db($conn,$dbname); //데이터베이스 연결
mysqli_query($conn,"set names utf8");

$USER_ID= $_POST["id"]; //전 화면의 id값 가져와 변수에 저장
$USER_NAME= $_POST["name"]; //전 화면의 name값 가져와 변수에 저장
$USER_PASSWORD= $_POST["password"]; //전 화면의 password값 가져와 변수에 저장
$PHONENUMBER= $_POST["phone1"].$_POST["phone2"].$_POST["phone3"];  //전 화면의 phone1,2,3 값 가져와 변수에 저장


 $sql ="INSERT INTO USER_INFO(USER_ID, USER_PASSWORD, USER_NAME, USER_PHONENUMBER) VALUES ('$USER_ID','$USER_PASSWORD','$USER_NAME','$PHONENUMBER')"; //위의 변수를 USER_INFO테이블에 삽입.

 $result = mysqli_query($conn,$sql);




if(!empty($result)){
echo '
 <script>
 alert("회원가입 성공");
 location.href="LOGIN_SCREEN.php";
 </script>';
}else{
  $error=mysqli_error($conn);
  echo '
 <script>
 alert("다른 아이디를 입력해주세요.");
 history.back(); //회원가입 실패 시
 </script>';
}
  mysqli_close($conn);

?>
