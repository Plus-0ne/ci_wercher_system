<script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/1.10.20_jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/1.10.20_dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/1.6.1_dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/1.6.1_buttons.flash.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/3.1.3_jszip.min.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets/js/0.1.53_pdfmake.min.js"></script> --> <!-- TODO: This script's load time is very slow. -->
<!-- <script type="text/javascript" src="<?=base_url()?>assets/js/0.1.53_vfs_fonts.js"></script> --> <!-- TODO: Big .js file. -->
<script type="text/javascript" src="<?=base_url()?>assets/js/1.6.1_buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/1.6.1_buttons.print.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/2.8.4_moment.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/1.10.20_datetime-moment.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script src="<?=base_url()?>assets/js/1.14.7_popper.min.js"></script>
<script src="<?=base_url()?>assets/js/4.3.1_bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/cfunctions.js"></script>

<!-- CUSTOM LIBRARIES -->
<!-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
<script src="<?=base_url()?>assets/js/bootstrap4-toggle.min.js"></script>
<script src="<?=base_url()?>assets/js/html2canvas.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		(function notifications() {
		    $.ajax({
		        type: "GET",
		        url: "<?php echo base_url() . 'AJAX_checkBellNotifCounter';?>",             
		        dataType: "html",           
		        success: function(response){                    
		            $("#BellNotifCounter").html(response);
		        }
		    }).then(function() {
		       setTimeout(notifications, 60000); // 60 seconds default interval
		    });
		})();
		$('#Bell').on('click', function () {
			$.ajax({
		        type: "GET",
		        url: "<?php echo base_url() . 'AJAX_resetBellNotifCounter';?>",             
		        dataType: "html",           
		        success: function(response){                    
		            $("#BellNotifCounter").html(response);
		        }
		    })
		});
		if (localStorage.getItem('SidebarVisible') == 'true') {
			$('#sidebar').addClass('active');
			$('.ncontent').addClass('shContent');
		} else {
			$('#sidebar').css('transition', 'all 0.3s');
			$('#content').css('transition', 'all 0.3s');
		}
		$('#sidebarCollapse').on('click', function () {
			if (localStorage.getItem('SidebarVisible') == 'true') {
				$('#sidebar').removeClass('active');
				$('.ncontent').removeClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
				localStorage.setItem('SidebarVisible', 'false');
			} else {
				$('#sidebar').addClass('active');
				$('.ncontent').addClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
				localStorage.setItem('SidebarVisible', 'true');
			}
		});
		$('.prompts-tray').on('click', function () {
			$(this).animate({left: "-1000px"});
		});
	});
</script>