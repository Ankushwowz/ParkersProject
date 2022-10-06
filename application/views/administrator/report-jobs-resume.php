<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<style>
    .dataTables_filter {
display: block;
} 

#search {
    margin-top: 30px;
}
#filterform1 {
    display: table;
    width: 100%;
    vertical-align: bottom;
    margin-bottom: 20px;
    margin-top: 10px;
}

#filterform1 .col-md-2.col-sm-3 {float: left;}
#date_filter {
    display: inline-block;
    float: left;
    height: 38px;
    width: 52%;
    margin-top: 30px;
}
.dataTables_scrollHeadInner, .display.table.table-bordered.table-striped.dataTable.no-footer {
    width: 100% !important;
}
</style>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
<div class="page-header">
    <div class="page-header-title">
                    <h4><?php echo $title; ?></h4>
                </div>
    <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Resume</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Resume</a>
                        </li>
                    </ul>
                </div>
</div>

<div class="wrapper buyer-view order-view shop-cls-main pr-main-cls">

<!--=====================  table-1 start ================ -->
    <div class="col-lg-12 filter-input-cls">
        <section class="panel">

            <div class="filter-users">
            <form id="filterform1" class="" action="<?php echo base_url(); ?>administrator/get_resumes" method="post" role="">
               
                <div class="col-md-2 col-sm-3">
                 <label for="usr">Filter Status</label>
                <select class="form-control" id="category_select" name="Rcategory">
                <option value="all">All</option>
                <option value="accept">Accept</option>
                <option value="reject">Reject</option>
                <option value="pending">Pending</option>             
                </select>
                </div>
                <div id="date_filter">
                <span id="date-label-from" class="date-label">From: </span>
                <input class="date-picker-min date"  name="fromDate" type="text" id="from" readonly="" />
                <input class="date-picker-max date" type="text"  name="toDate"  id="to" readonly="" />
    
                </div>
                <input type="submit" name="search" id="search">
                
            </form>
                </div>  
               <!--  <div class="clearfix"></div> -->
            <div class="page-body">
                 <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive adv-table">
                            <!-- <table id="dom-jqry" class="display table table-striped table-bordered nowrap"> -->
                        <table  class="display table table-bordered table-striped" id="dynamic-table1">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Full Name</th>
                                <th>City</th>
                                <th>French Status</th>
                                <th>Resume Status</th>
                                <th>Assigned By</th>
                                <th>StartDate</th>                               
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                        $count = 1; 
                        if(!empty($resume_job) ){                      
                        foreach ($resume_job as $resume) { ?>
                            <tr>
                                <td class="resume_id"><?php echo $count; ?></td>
                                 
                                        <td><?php echo $resume['title']; ?></td>
                                        <td><?php echo $resume['full_name']; ?></td>                                        
                                        <td><?php echo $resume['city']; ?></td>                                       
                                        <td><?php echo $resume['franch_status']; ?></td> 
                                        <td><?php echo $resume['resume_status']; ?></td> 
                                        <td><?php echo $resume['assigned_by']; ?></td> 
                                        <td><?php echo $resume['start_date']; ?></td> 
                                        
                                
                            </tr>
                       <?php $count++; } 
                   }
                       ?>
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                <!-- <div class="clearfix"></div> -->
            </div>   </div>
        </section>
    </div>
<!--===================== table-1 end ================ -->      
         </div>
<!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
 <!--<link href="jquery-ui.css" rel="stylesheet">-->
 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
       <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js">
</script>
<!--Add custom filter methods-->
<script type="text/javascript">
 

 $(document).ready(function() {
    /* Initialise the DataTable */
    var oTable = $('#dynamic-table1').dataTable({
        
        "iDisplayLength": 10,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "scrollX": true,
        "aaSorting": [[ 0, "asc" ]],
        "bFilter": true,
        dom: 'Bfrtip',
         buttons: [
                {
                    extend : 'excelHtml5',
                    exportOptions : {
                        columns : [0,1,2,3,4,5]
                    }
                },
                {
                    extend : 'csvHtml5',
                    exportOptions : {
                        columns : [0,1,2,3,4,5]
                    }
                },
                {
                    extend : 'pdfHtml5',
                    exportOptions : {
                        columns : [0,1,2,3,4,5]
                    }
                }]
    });

     
});
</script>
<script>
$('document').ready(function(){


  
  $( function() {
    var dateFormat = "yy/dd/mm",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 2,
          dateFormat: 'yy-mm-dd' 
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 2,
        dateFormat: 'yy-mm-dd' 
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );


$('#search1').on('click', function(e) {
    var category_select = $('#category_select').val();
   
   return false;
   


    $.ajax({
    type : 'POST',
    url  : '<?php echo base_url(); ?>administrator/get_resumes',
    dataType: 'json',
    cache: false,
    success :  function(result)
        {
            //pass data to datatable
            console.log(result); 
            $('#dynamic-table1').DataTable({
                "searching": false, 
                "data": [result], 
                "aoColumns": [
                  { "data": "id" },
                  { "data": "title" },
                  { "data": "full_name" },
                  { "data": "city" },
                  { "data": "status" },
                  { "data": "start_date" }
                ] 
            });
        }
    });
});
});
</script>
<script type="text/javascript">
//$('#min').datepicker();
//$('#max').datepicker();
/*$(document).ready(function() {
    $('#dynamic-table1').DataTable({

        "ajax": {
            url : "<?php echo base_url(); ?>administrator/get_resumes",
            type : 'GET',
        },
    });
});*/

</script>



<style>
.date input {
  background: transparent none repeat scroll 0 0 !important;
  border: 1px solid;
  position: relative;
  width: 100%;
  z-index: 1;
}
.date .fa.fa-calendar-o {
  font-size: 14px;
  position: absolute;
  right: 5px;
  top: 8px;
  z-index: 0;
}
.date {
  display: inline-block;
  position: relative;

}

.adv-table .dataTables_filter label {
  line-height: 2;
  vertical-align: middle;
  width: 100%;
}
.adv-table .dataTables_filter label input {
  float: right;
  height: 25px;
  width: auto;
}
</style>