<meta charset="UTF-8">
<HTML>
 <HEAD>
  <TITLE> 로그인 </TITLE>
  <style>
#title{font-size:30pt; text-align:center}
#subtitle{font-size:10pt; text-align:center}
a{text-decoration:none; color:black}
td{align:center; text-align:center;}
FONT{font-size:13pt; font-style:bold;}
</style>



<script>
function login(){ //ID,PW 확인 후 LOGIN.php로 넘어감

 var frm=document.loginform;

 if(frm.id.value.length<1){
  alert("아이디를 올바르게 입력해주세요");
  return;
 }

 if(frm.password.value.length<1){
  alert("비밀번호를 올바르게 입력해주세요");
  return;
 }
 frm.method="post";
 frm.action="./LOGIN.php";  //LOGIN.php : 입력한 아이디와 비밀번호가 DB에 저장되어있는 정보인지 확인
 frm.submit();
 }
 </script>

 </HEAD>
<body>
<form name="loginform" method="POST" action="LOGIN.php">
<table width="100%" height="300px" align="center" border="0">
<tr height="100px"></tr>
<tr>
  <td><div id="title">영화 예매</div></td>
 </tr>
 <tr>
  <td><div id="subtitle"><FONT>로그인</FONT></div><br></td>
 </tr>

 <tr>
  <td><input type="text" name="id" style="width:260px; height:30px" placeholder="아이디"></td>
 </tr>
 <tr>
  <td><input type="password" name="password" style="width:260px; height:30px" placeholder="비밀번호"></td>
 </tr>
 <tr>
  <td><br><input type="submit" style="width:300px; height:30px; border-radius:30px;" value="로그인" ></td>
 </tr>
 <tr>
  <td><br><table width="400px" border=1 align="center"></table></td>
 </tr>
 <tr>
  <td><div id="subtitle"><a href="JOIN_SCREEN.php">회원가입</a></div></td>
 </tr>
</table>

</form>
</body>
</HTML>
