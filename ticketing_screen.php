<?php
  $conn = mysqli_connect("localhost","root","9798") ;
  $dbname="movie";
  mysqli_select_db($conn,$dbname); //데이터베이스 연결
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      영화예매  
    </title>
    <script type="text/javascript">
    function displayImage(elem) {
      var image = document.getElementById("canvas");
      image.src = "./image/"+elem.value+".jpg";
    }
    </script>
  </head>
  <body>
    <header>

        <h2 id="login_info">
          <?php
          session_start();
          if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
          echo "<meta http-equiv='refresh' content='0;url=login.php'>";
          exit;
          }
          $user_id = $_SESSION['user_id'];
          $user_name = $_SESSION['user_name'];
          echo "<center><p>안녕하세요. $user_name($user_id)님</p></center>";
          echo "<center><p><a href='logout.php'>로그아웃</a></p></center>";
          echo "<center><p><a href='select_menu.php'>메뉴화면</a></p></center>";
          ?>

        </h2>

    </header>
    <article>
      <form action="end_ticketing.php" method="post">
        <div style="width:20%; height:480px; float:left;" >
        
        </div>
        <div style="width:20%; height:480px; float:left;">
          <table>
            <tr>
              <th colspan="3">
                예약정보입력
              </th>
            </tr>
            <tr>
              <td>
                극장 :
              </td>
              <td>
                <select name = "theatername">
                  <?php
                    $sql = "select theatername from theater_info";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='{$row["theatername"]}'>{$row["theatername"]}</option>";
                    }
                   ?>
                </select>
              </td>
              <td rowspan="5">
                <input type="submit" name="div3" value="예약" >
              </td>
            </tr>
            <tr>
              <td>
                영화 :
              </td>
              <td>
                <select name = "moviename" onchange="displayImage(this);">
                  <?php
                    $sql = "select distinct moviename from movie_info";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='{$row["moviename"]}'>{$row["moviename"]}</option>";
                    }
                   ?>
                </select>
              </td>
              <td>

              </td>
            </tr>
            <tr>
              <td>
                시간 :
              </td>
              <td>
                <select name = "screeningtime">
                  <?php
                    $sql = "select distinct screeningtime from movie_info";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='{$row["screeningtime"]}'>{$row["screeningtime"]}</option>";
                    }
                   ?>
                </select>
              </td>
              <td>

              </td>
            </tr>
            <tr>
              <td>
                가로열 :
              </td>
              <td>
                <select name = "seat_row">
                 <?php
                   $sql = "select distinct row from seat_info";
                   $result = mysqli_query($conn,$sql);
                   while ($row = mysqli_fetch_assoc($result)) {
                     echo "<option value='{$row["row"]}'>{$row["row"]}</option>";
                   }
                  ?>
                </select>
              </td>
              <td>

              </td>
            </tr>
            <tr>
              <td>
                세로열 :
              </td>
              <td>
                <select name = "seat_col">
                 <?php
                   $sql = "select distinct col from seat_info";
                   $result = mysqli_query($conn,$sql);
                   while ($row = mysqli_fetch_assoc($result)) {
                     echo "<option value='{$row["col"]}'>{$row["col"]}</option>";
                   }
                  ?>
                </select>
              </td>
              <td>

              </td>
            </tr>
            <tr>
              <td colspan="3">
                <img src="./seat.png" alt="좌석" width="100%" />
              </td>
            </tr>
          </table>
        </div>
        <div style="width:20%; height:480px; float:left;">
          <img id="canvas" src="./image/살아있다.jpg" height="100%"/>
        </div>
        <style="width:20%; height:480px; float:left;">

        </div>
      </form>
    </article>
  </body>
</html>
