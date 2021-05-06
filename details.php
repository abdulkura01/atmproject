<?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","steamledgedb");

    if(isset($_SESSION['user_id']) and !empty($_SESSION['user_id']))
    {
        
        $uId = $_SESSION['user_id'];
        $gdf = mysqli_query($conn,"SELECT `id`, `userId`, `bf`, `amnt`, `cf`, `detail`, `status`, `date`,`updated_at` FROM `ledger` WHERE `userId`='$uId'");

       

       echo "<table border='2' style='border-collapse:collapse;' align='center' width='1000px'>";
       echo "<p align='center'>UserID: ".$_SESSION['user_id']."</p>";
       echo "<h3 align='center'>View Transcation Details</h3>";
       echo "<tr><th>#</th><th>Previou Balance (N)</th><th>Credit (N)</th><th>Debit (N)</th><th>Current Balance (N)</th><th>Details</th><th>Date</th></tr>";
       $i=0;
        while($rows = mysqli_fetch_assoc($gdf))
        {
                echo "<tr>";
                    echo "<td>".++$i."</td>";
                    echo "<td align='right'>".number_format($rows['bf'],2)."</td>";

                    echo "<td align='right'>".(($rows['detail']=='CR')?number_format($rows['amnt'],2):'--')."</td>";

                    echo "<td align='right'>".(($rows['detail']=='DR')?number_format($rows['amnt'],2):'--')."</td>";

                    echo "<td align='right'>".number_format($rows['cf'],2)."</td>";
                    echo "<td>".($rows['detail']=='CR'?'Funding':'Withdrawal')."</td>";
                    echo "<td align='center'>".$rows['updated_at']."</td>";
                echo "</tr>";
        }
       echo "</table>";
       echo "<div align='center'>
            <button onClick='window.print()'>PRINT</button> |
            <button onClick='window.close()'>Close</button> |
       </div>";
    }
?>
<style type="text/css">
* {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
div#container {
	width:90%;
	min-width:1024px;
	margin:0 auto;
}
tr.res th {
	text-align:center;
}
@media print {
* {
	font-size:12px;
	margin:0px;
}
.span3 > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(16) > td:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(1), .span3 > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(16) > td:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(2), .span3 > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(16) > td:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(3), .span3 > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(16) > td:nth-child(1) > table:nth-child(1) > tbody:nth-child(1) > tr:nth-child(2) > td:nth-child(4) {
	font-size:8px;
	line-height:12px;
}
span {
	font-size:12px;
}
tr {
	line-height:14px;
}
.res > th:nth-child(5), .res > th:nth-child(4), .res > th:nth-child(3) {
	line-height:10px;
}
}
</style>

<style>.img{width:50px; font-size:10px !important; } th{ text-transform:uppercase;}td{ text-transform:capitalize;}
.current{ background:#ccc !important; color:#fff !important;}
.disabled{ background:#eee !important; color:#000 !important;}
td .btn{ margin:2px;}
@media screen{
	body{ width:70%; margin:0 auto;}
	}
	
</style>