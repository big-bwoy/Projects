<?php include('header.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">		
                       
				

<?php include("autoload.php");  

?>



<div class="container-fluid">
                       
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">ANIMALS (<?php echo count(animals::read_animals());  ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="all-animals.php">View Report</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">NEW BIRTHS (<?php echo count(births::read_births());  ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="all-births.php">View Report</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">TREATMENTS (<?php echo count(treatment::read_treatment());  ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="all-treatment.php">View Report</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">ANIMALS SERVICED (<?php echo count(servicing::read_servicing());  ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="all-servicing.php">View Report</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">VACCINATIONS (<?php echo count(vaccination::read_vaccination());  ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="all-vaccination.php">View Report</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-xl-6">
                                <form class="form-inline">
                                           between <input type="date" name="date"> and <input type="date" name="date2">
                                           <!-- shida ilikuwa hapa tulukwa tumeeka wring GET parameter -->
                                           <button onclick="this.form.submit();"><i class="fa fa-search"></i></button>
                               <?php $current_date="Today";
                               if (isset($_GET['date']) && isset($_GET['date2'])) {
                                    $current_date="<b style='color:rgba(200,45,187,.879);'>Search Results for dates: Between ".$_GET['date']." and ".$_GET['date2']."</b>";
                                } ?>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Production Cycle : <?php $current_date; ?>

                                        </form>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>


</div>





















				
				
			</div>		
			</div>
		</div>
    </div>