<html>
<head>
<style>
 ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   background: #FFB6C1;
   background-image: -webkit-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: -moz-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: -ms-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: -o-linear-gradient(top, #FFB6C1, #00FF7F);
   background-image: linear-gradient(to bottom, #FFB6C1, #00FF7F);
   }
   
 li {
   float: left;
   }
   
 li a {
   display: inline-block;
   color: white;
   text-align: center;
   padding: 20px 16px;
   text-decoration: none;
   font-weight: bold;
   }
   
 li a:hover {
   background-color: Gold;
   color: black;
   }
   
 a {
   font-family: 'Trebuchet MS', sans-serif;
   }
   
 /* Responsive layout - when the screen is less than 400px wide,make the navigation links stack on top of each other instead of next to each other */
 @media screen and (max-width: 400px) {
   .topnav a {
     float: none;
	 width: 100%;
	 }
	 }
</style>
</head>
<body>

<ul>
  <li><a href="index.php">Utama</a></li>
  <li><a href="pemenang.php">Keputusan</a></li>
  <li style="float:right">
    <a href="borang_login.php">Log Masuk</a></li>
</ul>

</body>
</html>