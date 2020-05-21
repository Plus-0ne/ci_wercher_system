<?php $T_Header;?>
<body>
	<div class="wrapper wercher-background-lowpoly">
		<?php $this->load->view('_template/users/u_sidebar'); ?>
		<div id="content" class="ncontent">
			<div class="container-fluid">
				<?php $this->load->view('_template/users/u_notifications'); ?>
				<div class="row wercher-tablelist-container">
					<?php 
						$this->load->library('Calendar');
						$calendar = new Calendar();
 						
						echo $calendar->show();
					 ?>
				</div>
			</div>
		</div>
	</div>
</body>
<?php $this->load->view('_template/users/u_scripts'); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
		if (localStorage.getItem('SidebarVisible') == 'true') {
			$('#sidebar').addClass('active');
			$('.ncontent').addClass('shContent');
		} else {
			$('#sidebar').css('transition', 'all 0.3s');
			$('#content').css('transition', 'all 0.3s');
		}
		$('#sidebarCollapse').on('click', function () {
			if (localStorage.getItem('SidebarVisible') == 'false') {
				$('#sidebar').addClass('active');
				$('.ncontent').addClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
		    	localStorage.setItem('SidebarVisible', 'true');
			} else {
				$('#sidebar').removeClass('active');
				$('.ncontent').removeClass('shContent');
				$('#sidebar').css('transition', 'all 0.3s');
				$('#content').css('transition', 'all 0.3s');
		    	localStorage.setItem('SidebarVisible', 'false');
			}
		});
</script>
<style type="text/css">
	/*******************************Calendar Top Navigation*********************************/
	div#calendar{
	  margin:0px;
	  padding:0px;
	  width: 602px;
	  font-family:Helvetica, "Times New Roman", Times, serif;
	}
	 
	div#calendar div.box{
	    position:relative;
	    top:0px;
	    left:0px;
	    width:100%;
	    height:40px;
	    background-color:   #4a3a15 ;      
	}
	 
	div#calendar div.header{
	    line-height:40px;  
	    vertical-align:middle;
	    position:absolute;
	    left:11px;
	    top:0px;
	    width:582px;
	    height:40px;   
	    text-align:center;
	}
	 
	div#calendar div.header a.prev,div#calendar div.header a.next{ 
	    position:absolute;
	    top:0px;   
	    height: 17px;
	    display:block;
	    cursor:pointer;
	    text-decoration:none;
	    color:#FFF;
	}
	 
	div#calendar div.header span.title{
	    color:#FFF;
	    font-size:18px;
	}
	 
	 
	div#calendar div.header a.prev{
	    left:0px;
	}
	 
	div#calendar div.header a.next{
	    right:0px;
	}
	 
	 
	 
	 
	/*******************************Calendar Content Cells*********************************/
	div#calendar div.box-content{
	    border:1px solid #4a3a15 ;
	    border-top:none;
	}
	 
	 
	 
	div#calendar ul.label{
	    float:left;
	    margin: 0px;
	    padding: 0px;
	    margin-top:5px;
	    margin-left: 5px;
	}
	 
	div#calendar ul.label li{
	    margin:0px;
	    padding:0px;
	    margin-right:5px;  
	    float:left;
	    list-style-type:none;
	    width:80px;
	    height:40px;
	    line-height:40px;
	    vertical-align:middle;
	    text-align:center;
	    color:#000;
	    font-size: 15px;
	    background-color: transparent;
	}
	 
	 
	div#calendar ul.dates{
	    float:left;
	    margin: 0px;
	    padding: 0px;
	    margin-left: 5px;
	    margin-bottom: 5px;
	}
	 
	/** overall width = width+padding-right**/
	div#calendar ul.dates li{
	    margin:0px;
	    padding:0px;
	    margin-right:5px;
	    margin-top: 5px;
	    vertical-align:middle;
	    float:left;
	    list-style-type:none;
	    width:80px;
	    height:80px;
	    font-size:18px;
	    background-color: #DDD;
	    color:#000;
	    text-decoration: none;
	}

	div#calendar ul.dates li span{
	    margin-left: 5px;
	}

	div#calendar ul.dates li span a{
	    color: #000;
	}
	 
	div#calendar ul.dates li span .calendar-event{
	    text-align: center;
	    color: #735600;
	}

	:focus{
	    outline:none;
	}
	 
	div.clear{
	    clear:both;
	}
</style>
</html>