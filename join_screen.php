<meta charset="UTF-8">
<HTML>
 <HEAD>
  <TITLE> 회원가입 </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <style>
#title{font-size:30pt; text-align:center}
#subtitle{font-size:10pt; text-align:center}
a{text-decoration:none; color:black}
td{align:center; text-align:center;}
FONT{font-size:13pt; font-style:bold;}
</style>

<script>

 function enroll() { //등록 버튼

  var frm = document.joinform;

  if (frm.id.value.length < 3) {
   alert("아이디는 3자 이상 입력해주세요");
   return;
  }
  if (frm.password.value.length < 4) {
   alert("비밀번호는 4자이상 입력해주세요");
   return;
  }
  if (frm.password.value != frm.password_check.value) {
   alert("비밀번호가 다릅니다");
   return;
  }
  if (frm.name.value.length < 1) {
   alert("이름을 입력해주세요");
   return;
  }


  frm.method = "post";
  frm.action = "./JOIN.php"; //조건이 성립되면, JOIN.php로 이동합니다!
  frm.submit();
 }
 </script>
 </HEAD>

<body>
<form name="joinform" method="POST">
<table width="500px" height="300px" align="center" border="0" class="td">
<tr height="100px"></tr>
<tr>
  <td><div id="title">영화 예매</div></td>
 </tr>
 <tr>
  <td><div id="subtitle"><FONT>회원가입</FONT></div><br></td>
 </tr>


 <tr>
  <td><br><input type="text" name="id" width="70px" placeholder="아이디"></td>
 </tr>
 <tr>
  <td><input type="text" name="name" width="140px" placeholder="이름"></td>
 </tr>
 <tr>
  <td><input type="password" name="password" width="140" placeholder="비밀번호"></td>
 </tr>
 <tr>
  <td><input type="password" name="password_check" width="140" placeholder="비밀번호 확인"></td>
 </tr>
 <tr>
  <td>
  <input type="text" name="phone1"  style="width: 70px" value="010" >
  - <input type="text" name="phone2"  style="width: 70px" placeholder="휴대폰번호">
  - <input type="text" name="phone3"  style="width: 70px"></td>
 </tr>
 <tr>
  <td><br><input type="button" style="width:300px; height:30px; border-radius:30px" value="가입하기" onClick="enroll()" ></td>
 </tr>
 <tr>
  <td><br><table width="400px" border=1 align="center"></table></td>
 </tr>
 <tr>
  <td></td>
 </tr>
</table>
