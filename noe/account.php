<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="navStyle_merged.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body bgcolor="#085078">

<div class="nav-top">
    <div class="logo">
        <img src="logo_wsdc.png" alt="wsdc logo" width="105"/>
    </div>
<div class="nav">
  <ul>
  <li><a href="#">
    <span class="fa fa-home" aria-hidden="true"> </span>
     Home</a></li>
  <li><a href="#">
    <span class="fa fa-info-circle" aria-hidden="true"> </span>
     About</a></li>
  <li><a href="signout.php?q=account.php">
    <?php
        include_once 'dbConnection.php';
        session_start();
        if(isset($_SESSION['username'])){
            echo "{$_SESSION['name']}";
        }
     ?>
     <span class="fa fa-angle-down fa-lg" aria-hidden="true">
     </a></li>
  <li>
    
    <!-- <div class="dropdown">
    <button class="dropbtn">Touqeer 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> --> 
  </ul>
  </div>
</div>
<div class="external-container" id="ext1">
  <div class="internal-container" id="int1">
    <div class="container">
      <nav class="navigation">
        <ul class="mainmenu" id="mainmenu">
          <li><a href="" class="nav_options"><i class="fa fa-home fa-lg"></i> Home</a></li>
          <li><a href="" class="nav_options">About</a></li>
          <li class="dropdown_li"><a href="" class="nav_options">Products <i style="float:right;"class="fa fa-angle-left fa-lg" aria-hidden="true"></i></a>
            <ul id="mySubmenu" class="submenu">
              <li><a href="">Tops</a></li>
              <li><a href="">Bottoms</a></li>
              <li><a href="">Footwear</a></li>
            </ul>
          </li>
          <li><a href="" class="nav_options">Contact us</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="internal-container" id="int2">
    <div class="container" id="main-content">
      <span class="table-caption">Your Exams</span>
      <?php 
        if(@$_GET['q']==1) {
          include_once 'dbConnection.php';
          $result = mysqli_query($con,"SELECT * FROM exam") or die('Error aya hai');
          echo'<table ><tr><th>S.N.</th><th>Topic</th><th>Subject</th><th>Total questions</th><th>Total Marks</th><th>Time limit</th></tr>';
          $c=1;
          while($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $inc = $row['increment'];
            $dec = $row['decrement'];
            $time = $row['time'];
            $eid = $row['eid'];
            $sid = $row['subject_id'];
            // echo'<h4>'.$sid.'</h4>';
            $total_marks = $total * $inc;
            $sql=mysqli_query($con,"SELECT distinct * FROM subject WHERE sid='$sid'")or die('');
            $rowcount=mysqli_num_rows($sql);
            if($rowcount>0){
              $sub_row = mysqli_fetch_array($sql);
              $sub_name = $sub_row['title'];
            }
            else{
              $sub_name = 'N/A';
            }
            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$sub_name.'</td><td>'.$total.'</td><td>'.$total_marks.'</td><td>'.$time.' min. <td style="text-align:center; border:none"><a href="account.php?q=exam&step=2&eid='.$eid.'&n=1&t='.$total.'"  class="myButton3">Start</b></a></td></tr>';
          }   

           echo '<table>';
        } 
      ?>
      <?php
        if(@$_GET['q']== 'exam' && @$_GET['step']== 2) {
          $eid=@$_GET['eid'];
          $sn=@$_GET['n'];
          $total=@$_GET['t'];
          $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
          // echo '<div style="margin:5%">';
          while($row=mysqli_fetch_array($q) )
          {
            $qns=$row['qns'];
            $qid=$row['qid'];
            echo '<div class="questionSet"><div class="question">Question '.$sn.' :: '.$qns.'</div>';

            $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
          echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST">';

          while($row=mysqli_fetch_array($q) )
          {
          $option=$row['option'];
          $optionid=$row['optionid'];
          echo'<div class="option"><input type="radio" name="ans" value="'.$optionid.'">'.$option.'</div><br />';
          }
          echo'<button type="submit" class="myButton3"><i class="fa fa-lock" aria-hidden="true"></i> Submit</button></form></div>';
          //header("location:dash.php?q=4&step=2&eid=$id&n=$total");
          }
        }
        
        //result display
        if(@$_GET['q']== 'result' && @$_GET['eid']) 
        {
        $eid=@$_GET['eid'];
        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
        echo  '<div class="panel">
        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

        while($row=mysqli_fetch_array($q) )
        {
        $s=$row['score'];
        $w=$row['wrong'];
        $r=$row['sahi'];
        $qa=$row['level'];
        echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
              <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
            <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
            <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
        }
        $q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
        while($row=mysqli_fetch_array($q) )
        {
        $s=$row['score'];
        echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
        }
        echo '</table></div>';

        }
        ?>
        <!-- quiz 0101 -->
    </div>
  </div>
  <script>
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  var ul_menu = document.getElementsByClassName('mainmenu');
   /* document.getElementsByClassName('nav_options').onclick = function(event) {
  	  event.preventDefault();
	  console.log("I am cliked");
  }*/
  
  ul_menu[0].addEventListener('click', function(e) {
    if (e.target.tagName === 'A'){
  	   e.preventDefault();
  	
  		var all_li = document.getElementById("mainmenu").getElementsByTagName('li');
  		for(var i=0; i < all_li.length; i++){
  			all_li[i].classList.remove('selected');
  		}
      if(e.target.parentNode.classList.contains('dropdown_li')){
        console.log("dropdown selected");
        var sub = document.getElementById("mySubmenu");
        sub.classList.remove('submenu');
        sub.classList.add('show_submenu');
      }
      else{
        var sub = document.getElementById("mySubmenu");
        if(sub.classList.contains('show_submenu')){
            console.log("dropdown was selected");
            sub.classList.remove('show_submenu'); 
            sub.classList.add('submenu'); 
        }
        else{
          console.log("dropdown was not selected");
        } 
      }
  		e.target.parentNode.classList.add('selected');
    	var x = this.parentElement.nodeName;
    }
});
  // window.onclick = function(event) {
  //   if (!event.target.matches('.dropbtn')) {
  //     var dropdowns = document.getElementsByClassName("dropdown-content");
  //     var i;
  //     for (i = 0; i < dropdowns.length; i++) {
  //       var openDropdown = dropdowns[i];
  //       if (openDropdown.classList.contains('show')) {
  //         openDropdown.classList.remove('show');
  //       }
  //     }
  //   }
  // }
  </script>

</body>
</html>
