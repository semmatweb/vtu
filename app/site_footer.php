<div class="footer_part">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p><?php echo date("Y"); ?> © <?php echo strtoupper($domain); ?> <br>  <a href="https://api.whatsapp.com/send?phone=2348064748270&text=Hi%20there!%20" style="font-size: 15px" >design by doublehigh_tech</a> </p>
</div>
</div>
</div>
</div>
</div>
</section>
<script type="text/javascript">
	function FundWallet(){
	window.location.href="wallet_option";
	}
</script>
<script type="text/javascript">
	$("#submitRate").click(function () {
	$("#rateModal").modal("hide");
	var rate_comment = $("#rate_comment").val();
	$.ajax({
		url:'customer/review',
		method:'POST',
		dataType:'json',
		data:{rate_comment:rate_comment},
		success:function(rate_response){
	$("#rateRes").modal("show");
	$("#rateRes .modal-body").html(rate_response.message);
		}
	})
	})
</script>

<div id="back-top" style="display: none;">
<a title="Go to Top" href="#">
<i class="ti-angle-up"></i>
</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="backend/js/jquery1-3.4.1.min.js"></script>

<script src="backend/js/popper1.min.js"></script>

<script src="backend/js/bootstrap1.min.js"></script>

<script src="backend/js/metisMenu.js"></script>

<script src="backend/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="backend/vendors/chartlist/Chart.min.js"></script>

<script src="backend/vendors/count_up/jquery.counterup.min.js"></script>

<script src="backend/vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="backend/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="backend/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="backend/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="backend/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="backend/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="backend/vendors/datatable/js/jszip.min.js"></script>
<script src="backend/vendors/datatable/js/pdfmake.min.js"></script>
<script src="backend/vendors/datatable/js/vfs_fonts.js"></script>
<script src="backend/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="backend/vendors/datatable/js/buttons.print.min.js"></script>

<script src="backend/vendors/datepicker/datepicker.js"></script>
<script src="backend/vendors/datepicker/datepicker.en.js"></script>
<script src="backend/vendors/datepicker/datepicker.custom.js"></script>
<script src="backend/js/chart.min.js"></script>
<script src="backend/vendors/chartjs/roundedBar.min.js"></script>

<script src="backend/vendors/progressbar/jquery.barfiller.js"></script>

<script src="backend/vendors/tagsinput/tagsinput.js"></script>

<script src="backend/vendors/text_editor/summernote-bs4.js"></script>
<script src="backend/vendors/am_chart/amcharts.js"></script>

<script src="backend/vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="backend/vendors/scroll/scrollable-custom.js"></script>

<script src="backend/vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
<script src="backend/vendors/vectormap-home/vectormap-world-mill-en.js"></script>

<script src="backend/vendors/apex_chart/apex-chart2.js"></script>
<script src="backend/vendors/apex_chart/apex_dashboard.js"></script>
<script src="backend/vendors/echart/echarts.min.js"></script>
<script src="backend/vendors/chart_am/core.js"></script>
<script src="backend/vendors/chart_am/charts.js"></script>
<script src="backend/vendors/chart_am/animated.js"></script>
<script src="backend/vendors/chart_am/kelly.js"></script>
<script src="backend/vendors/chart_am/chart-custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="backend/js/dashboard_init.js"></script>
<script src="backend/js/custom.js"></script>
</body>

</html>