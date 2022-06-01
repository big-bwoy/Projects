</main>


<?php include_once("autoload.php"); ?>
<script>
        <?php $data=apan::piechartDetails(); ?>
         new Chart(document.querySelector("#canvas"),{
            type: 'pie',
            data: {
                labels: <?php echo $data[0]; ?>,
                datasets: [{
                    label: "DISPATCHED ITEMS",
                    backgroundColor: <?php echo $data[2]; ?>,
                    data: <?php echo $data[1]; ?>
                }]
            },
            options:{
                title: {
                    display:true,
                    text: "Types of Meter Available"
                }
            }
         });
       
    </script> 

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    $('table').DataTable();
//$('#tb1').DataTable();
//$('#tb2').DataTable();
//$('#tb3').DataTable();
</script>
    <script type="text/javascript">
        function disp(elem,displ){
            document.querySelector(elem).style.display=displ;
        }

        function sbForm(){
            var a=new FormData(document.forms['frr']);
            $.ajax({
                url: "includes/folder-ajax.php",
                data:a,
                type: "POST",
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $("#loader").show(130);
                },
                success:function(res){
                    $("#loader").hide(30);
                    $("#pk").modal('hide');
                    $("#folders").html(res);

                }

            });
        }


        function notifyy(){
            var a=new FormData(document.forms['frr']);
            $.ajax({
                url: "includes/notification-ajax.php",
                data:a,
                type: "POST",
                contentType:false,
                processData:false,
                beforeSend:function(){
                    $("#loader").show(10);
                    
                     
                },
                success:function(res){
                   $("#loader").hide(3000);
                    //$("#pk").modal('hide');
                    // $("#notify").show();
                    $("#notify").html(res);

                }

            });
            setTimeout(notifyy,600);
        }
        window.onload=notifyy();
    </script>
</body>
</html>