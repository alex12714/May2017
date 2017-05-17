<?php
//ob_start();
include_once 'booking-list-calendar.inc.php';
//include_once '../classes/settings.php';


 
?>
 <link href="../css/bootstrap.css" rel="stylesheet"/>

<!--<link rel="stylesheet" type="text/css" href="../css/bic_calendar.css"/>-->
<script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
 <script type="text/javascript" src="../jquerycalender/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycalender/jquery-ui.css"/>
<style>
    #datepicker1 .ui-datepicker tbody td.highlight{ 
         
         background-color: red;
        border-color: red;
        padding: 5px;
    }
    #datepicker1 .ui-datepicker tbody td.bookinghighlight{ 
       
       background-color: green;
        border-color: green;
        padding: 5px;
         
       
    }
    </style>

    <script>

//       
        var bookingholydays = ['<?php foreach ($propertydate as $det){; ?>','<?php echo $det ; ?>','<?php } ?>'];
        var  holydays = [            
        '<?php foreach($booking_deatils as $booking_det){
     $booking_check_in=date('Y/m/d', strtotime($booking_det['check_in']));
     $booking_ch_out=date('Y/m/d', strtotime($booking_det['check_out']));
     $day1 = 86400;
    $format = 'Y/m/d';
     $booking_check = strtotime($booking_check_in);
     $booking_out = strtotime($booking_ch_out);
    $numDays1 = round(($booking_out - $booking_check) / $day1) + 1;
    $bookingdate = array();
           for ($i = 0; $i < $numDays1; $i++) {
        $bookingdate[] = date($format, ($booking_check + ($i * $day1)));
    }   
 ?>','<?php foreach ($bookingdate as $booking_det){; ?>','<?php echo $booking_det ; ?>','<?php } ?>','<?php $j++;} ?>'];

        function highlightDays(date) {

            for (var i = 0; i < holydays.length; i++) {
                if (new Date(holydays[i]).toString() == date.toString()) {
                    return [true, 'highlight'];
                }
                
            }
            for (var i = 0; i < bookingholydays.length; i++) {
                
                if (new Date(bookingholydays[i]).toString() == date.toString()) {
                    return [true, 'bookinghighlight'];
                }
            }
            return [true, ''];

        }
        $(function() {
            $("#datepicker1").datepicker({
                minDate: 0,
                maxDate: "+12M",
                prevText: "",
                nextText: "",
                inline: true,
                dateFormat: 'yy/mm/dd',
                onSelect: function(dateText, inst) {

                    var month = dateText.getUTCMonth();
                    var day = dateText.getUTCDate();
                    var year = dateText.getUTCFullYear();

                },
                beforeShowDay: highlightDays,<?php if (!$row_res) { ?>
                    onSelect: function(selected, evnt) {
                        ajexslotsdata(selected, '<?php echo date("m/d/Y"); ?>');
                    }
<?php } ?>
        });
    });
    </script>



<div class="clearfix hidden-sm hidden-xs" style="height: 10px;"></div>

                <div class="clearfix"></div><br/>
                <div class="col-md-6"></div>
                <div class="col-md-4">
                   
                    <div class="clearfix"></div><br/>
                    <div id="datepicker1"></div>
                </div>
           
       

























