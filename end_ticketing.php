<?php
  $conn = mysqli_connect("localhost","root","9798") ;
  $dbname="movie";
  mysqli_select_db($conn,$dbname); //데이터베이스 연결

  session_start();
  $U_ID = $_SESSION['user_id'];
  $user_name = $_SESSION['user_name'];



  $sql = "SELECT * from theater_info where theatername = '{$_POST["theatername"]}'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $T_ID = $row['T_ID'];  //사용자가 선택한 극장id 변수에 저장
  $theatername = $row['theatername'];
  $location = $row['location'];
  $callnumber = $row['callnumber'];


  $sql = "SELECT * from movie_info where moviename = '{$_POST["moviename"]}' and screeningtime = '{$_POST["screeningtime"]}'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $M_ID = $row['M_ID'];  
  $moviename = $row['moviename'];
  $hallname = $row['hallname'];
  $screeningtime = $row['screeningtime'];


  $sql = "SELECT * from seat_info where row = '{$_POST["seat_row"]}' and col = '{$_POST["seat_col"]}'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $S_ID = $row['S_ID'];  
  $s_row = $row['row'];
  $s_col = $row['col'];



  $sql = "SELECT M_ID,T_ID,S_ID from ticket_info where  M_ID = {$M_ID} AND T_ID = {$T_ID} AND S_ID = {$S_ID}";
  $result = mysqli_query($conn,$sql);
  $qarray = mysqli_fetch_assoc($result);
  if(!empty($qarray)){ //qarray가 비어있으면 정보가 DB에 없음.
     echo "<script>alert('중복 좌석입니다. 다른 좌석을 선택해 주세요.'); location.href=('./ticketing_screen.php');</script>";
     //좌석중복확인
  }
  else{
     $sql = "INSERT into ticket_info(U_ID,M_ID,T_ID,S_ID) values('{$U_ID}',{$M_ID},{$T_ID},{$S_ID})";
     $result = mysqli_query($conn,$sql);
     echo "<script>alert('예약이 완료되었습니다.');</script>";
     $sql = "SELECT TK_ID FROM ticket_info where U_ID = '{$U_ID}' AND M_ID = {$M_ID} AND T_ID = {$T_ID} AND S_ID = {$S_ID}";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($result);
     $TK_ID = $row['TK_ID'];
     //예약
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>예약완료</title>
  </head>
  <body>
    <center>
      <a href='./select_menu.php'>메뉴창으로</a>
    </center>
    <div>
      <table width="50%" height="300px" align="center" border="0">
        <thead>
          <tr>
            <td colspan="4">
              <center><?php  echo $user_name."(".$U_ID;?>)님 예매가 완료되었습니다.</center>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="6">
              <img src="<?php echo "./image/{$_POST["moviename"]}.jpg" ?>" width="350px" />
            </td>
            <td>
              예매번호 : 
            </td>
            <td colspan="2">
              <?php echo $TK_ID; ?>
            </td>
          </tr>
          <tr>
            <td>
              영화명 : 
            </td>
            <td colspan="2">
              <?php echo $moviename; ?>
            </td>
          </tr>
          <tr>
            <td>
              극장 : 
            </td>
            <td colspan="2">
              <?php echo $theatername; ?>
            </td>
          </tr>
          <tr>
            <td>
              상영관 : 
            </td>
            <td colspan="2">
              <?php echo $hallname; ?>
            </td>
          </tr>
          <tr>
            <td>
              상영시간 : 
            </td>
            <td colspan="2">
              <?php echo $screeningtime; ?>
            </td>
          </tr>
          <tr>
            <td>
              좌석 :
            </td>
            <td colspan="2">
              <?php echo $s_row.$s_col; ?>
            </td>
          </tr>
          <tr>
            <td colspan="4">
              극장위치 : <?php echo $location; ?>
              <br>
              전화번호 : <?php echo $callnumber; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
  </body>
</html>
