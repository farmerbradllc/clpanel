<?php
//	session_start();
	$self = $_SERVER["PHP_SELF"];
	$lpage = $_GET["lpage"];
	$search = $_POST["search"];
	$date = $_POST["date"];

	// Give me the option to go back over 3 days
	$neg1 = strtotime("-1 days");
	$neg2 = strtotime("-2 days");
	$neg3 = strtotime("-3 days");
	$neg4 = strtotime("-4 days");
	$neg5 = strtotime("-5 days");
	$neg6 = strtotime("-6 days");
	$neg7 = strtotime("-7 days");
	$neg8 = strtotime("-8 days");
	$neg9 = strtotime("-9 days");
	$neg10 = strtotime("-10 days");

	$today = date("M j");
	$neg1_d = date("M j", $neg1);
	$neg2_d = date("M j", $neg2);
	$neg3_d = date("M j", $neg3); 
	$neg4_d = date("M j", $neg4); 
	$neg5_d = date("M j", $neg5); 
	$neg6_d = date("M j", $neg6); 
	$neg7_d = date("M j", $neg7); 
	$neg8_d = date("M j", $neg8); 
	$neg9_d = date("M j", $neg9); 
	$neg10_d = date("M j", $neg10); 
?>
<html>
<title>Craigslist Global Search</title>
<head>
<link rel="stylesheet" href="stylesheets/style.css" type="text/css" media="screen">
</head>
<div id="page">
  <div id="header">
    <table><tr>
    	<td><a href="http://mymanagedpbx.com"><img src="images/logo.png" border="0"></a></td><td>Craigslist Global Search!</td></tr>
    </table>
  </div>
  <div id="links">
    <?php
	// Set the page search options
	if($lpage == "gigs") {
	  echo "
	    <form action=$self?lpage=gigs method=post>
	    <table><td><b>GIG SEARCH</b> </td><td><a href=index.php>Clear/Home</a> </td><td><input type=submit name=search value=php> </td>
	    <td><input type=submit name=search value=linux> </td>
	    <td><input type=submit name=search value=asterisk> </td>
	    <td><input type=submit name=search value=freeswitch> </td>
	    <td><input type=submit name=search value=perl> </td>
	    <td><input type=submit name=search value=oracle> </td>
	    <td>
	    <select name=date size=1>
	 	<option value=\"$today\">$today</option>
		<option value=\"$neg1_d\">$neg1_d</option>
		<option value=\"$neg2_d\">$neg2_d</option>
		<option value=\"$neg3_d\">$neg3_d</option>
		<option value=\"$neg4_d\">$neg4_d</option>
		<option value=\"$neg5_d\">$neg5_d</option>
		<option value=\"$neg6_d\">$neg6_d</option>
		<option value=\"$neg7_d\">$neg7_d</option>
		<option value=\"$neg8_d\">$neg8_d</option>
		<option value=\"$neg9_d\">$neg9_d</option>
		<option value=\"$neg10_d\">$neg10_d</option>
	    </select>
	    </td>
	    </table>
	    </form>
	  ";
	}
	elseif($lpage == "jobs") {
	  echo "
	    <form action=$self?lpage=jobs method=post>
	    <table><td><b>JOB SEARCH</b> </td><td><a href=index.php>Clear/Home</a> </td><td><input type=submit name=search value=php> </td>
	    <td><input type=submit name=search value=linux> </td>
	    <td><input type=submit name=search value=asterisk> </td>
	    <td><input type=submit name=search value=freeswitch> </td>
	    <td><input type=submit name=search value=perl> </td>
	    <td><input type=submit name=search value=oracle> </td>
	    <td>
	    <select name=date size=1>
	 	<option value=\"$today\">$today</option>
		<option value=\"$neg1_d\">$neg1_d</option>
		<option value=\"$neg2_d\">$neg2_d</option>
		<option value=\"$neg3_d\">$neg3_d</option>
		<option value=\"$neg4_d\">$neg4_d</option>
		<option value=\"$neg5_d\">$neg5_d</option>
		<option value=\"$neg6_d\">$neg6_d</option>
		<option value=\"$neg7_d\">$neg7_d</option>
		<option value=\"$neg8_d\">$neg8_d</option>
		<option value=\"$neg9_d\">$neg9_d</option>
		<option value=\"$neg10_d\">$neg10_d</option>
	    </select>
	    </td>
	    </table>
	    </form>
	  ";
	} else {
	  echo "
	    <b>FUNCTION:</b>
	    <a href=index.php?lpage=jobs>Search jobs</a> |
	    <a href=index.php?lpage=gigs>Search gigs</a> | 
	    <a href=https://accounts.craigslist.org/ target=_blank>Post to CL</a>
	  ";
	}
    ?>
  </div>
  <div id="display">
  <!--# Where all the PHP happens #-->
  <?php
    if($lpage == "gigs") {
	if($search == "php") {
		system("./getit.pl gigs php \"$date\"", $retval);
		echo $retval;
	}
	if($search == "perl") {
		system("./getit.pl gigs perl \"$date\"", $retval);
		echo $retval;
	}
	if($search == "asterisk") {
		system("./getit.pl gigs asterisk \"$date\"", $retval);
		echo $retval;
	}
	if($search == "freeswitch") {
		system("./getit.pl gigs freeswitch \"$date\"", $retval);
		echo $retval;
	}
	if($search == "linux") {
		system("./getit.pl gigs linux \"$date\"", $retval);
		echo $retval;
	}
	if($search == "oracle") {
		system("./getit.pl gigs oracle \"$date\"", $retval);
		echo $retval;
	}
    }
    if($lpage == "jobs") {
	if($search == "php") {
		system("./getit.pl jobs php \"$date\"", $retval);
		echo $retval;
	}
	if($search == "perl") {
		system("./getit.pl jobs perl \"$date\"", $retval);
		echo $retval;
	}
	if($search == "asterisk") {
		system("./getit.pl jobs asterisk \"$date\"", $retval);
		echo $retval;
	}
	if($search == "freeswitch") {
		system("./getit.pl jobs freeswitch \"$date\"", $retval);
		echo $retval;
	}
	if($search == "linux") {
		system("./getit.pl jobs linux \"$date\"", $retval);
		echo $retval;
	}
	if($search == "oracle") {
		system("./getit.pl jobs oracle \"$date\"", $retval);
		echo $retval;
	}
    } 

  ?>
  </div>
  <div id="footer">
	<a href="http://dan.mymanagedpbx.com/wordpress">Created by Danny Williams of My Managed PBX</a>
  </div>
</div>
</html>
