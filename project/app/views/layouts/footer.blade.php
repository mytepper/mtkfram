@section("footer")

      <!-- Begin: Page Footer -->
      <footer id="content-footer" class="affix">
        <div class="row">
        </div>
      </footer>
      <!-- End: Page Footer -->
      <!-- BEGIN: PAGE SCRIPTS -->
		  <!-- jQuery -->
      
      <!-- Route in javascript -->
      <script type="text/javascript">
      var Route = "{{URL::to('/')}}/";
      </script>

		  <script src="{{URL::to('assets/theme/vendor/jquery/jquery-1.11.1.min.js')}}"></script>
		  <script src="{{URL::to('assets/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>

      <!-- Validate form -->
      <script type="text/javascript" src="{{URL::to('assets/script/jquery.validate.min.js')}}"></script>

		  <!-- HighCharts Plugin -->
		  <script src="{{URL::to('assets/theme/vendor/plugins/highcharts/highcharts.js')}}"></script>

      <!-- PNotify -->
      <script src="{{URL::to('assets/theme/vendor/plugins/pnotify/pnotify.js')}}"></script>

      <!-- BS Dual Listbox Plugin -->
      <script src="{{URL::to('assets/theme/vendor/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

      <!-- Select2 Plugin Plugin -->
      <script src="{{URL::to('assets/theme/vendor/plugins/select2/select2.min.js')}}"></script>


		  <!-- Bootstrap Tabdrop Plugin -->
		  <script src="{{URL::to('assets/theme/vendor/plugins/tabdrop/bootstrap-tabdrop.js')}}"></script>

        <!-- Datatables -->
      <script src="{{URL::to('assets/theme/vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
      <script src="{{URL::to('assets/theme/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
      <script src="{{URL::to('assets/theme/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
      <script src="{{URL::to('assets/theme/vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

		  <!-- Theme Javascript -->
		  <script src="{{URL::to('assets/theme/assets/js/utility/utility.js')}}"></script>
		  <script src="{{URL::to('assets/theme/assets/js/demo/demo.js')}}"></script>
		  <script src="{{URL::to('assets/theme/assets/js/main.js')}}"></script>

		  <!-- Widget Javascript -->
		  <script src="{{URL::to('assets/theme/assets/js/demo/widgets.js')}}"></script>

		    <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Demo JS  
    Demo.init();
 

    // Init Theme Core    
    Core.init();


    // Init Widget Demo JS
    // demoHighCharts.init();

    // Because we are using Admin Panels we use the OnFinish 
    // callback to activate the demoWidgets. It's smoother if
    // we let the panels be moved and organized before 
    // filling them with content from various plugins

    // Init plugins used on this page
    // HighCharts, JvectorMap, Admin Panels

    // Init Admin Panels on widgets inside the ".admin-panels" container


    //fide form and validate
    $('form:not(".novalidate")').each(function () {
        $(this).validate();
    });

    // fide input and set attr required
    //$('input:not(".norequired")').each(function(){
    //  $(this).attr("required","required");
    //});

   //auto hide alert
    setTimeout(function(){ $('.alert').fadeOut(500);}, 4000);
    //data tables
    $('.datatables').DataTable();
    $('.datatables-nofilter').DataTable({"bFilter": false});
    //select2
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $('.select2').each(function(){
      $(this).select2();
    })

    var datepicker = $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();


    $('.admin-panels').adminpanel({
      grid: '.admin-grid',
      draggable: true,
      preserveGrid: true,
      // mobile: true,
      onStart: function() {
        // Do something before AdminPanels runs
      },
      onFinish: function() {
        $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

        // Init the rest of the plugins now that the panels
        // have had a chance to be moved and organized.
        // It's less taxing to organize empty panels
        demoHighCharts.init();
        runVectorMaps(); // function below
      },
      onSave: function() {
        $(window).trigger('resize');
      }
    });



    // Init plugins for ".task-widget"
    // plugins: Custom Functions + jQuery Sortable
    //
    var taskWidget = $('div.task-widget');
    var taskItems = taskWidget.find('li.task-item');
    var currentItems = taskWidget.find('ul.task-current');
    var completedItems = taskWidget.find('ul.task-completed');

    // Init jQuery Sortable on Task Widget
    taskWidget.sortable({
      items: taskItems, // only init sortable on list items (not labels)
      handle: '.task-menu',
      axis: 'y',
      connectWith: ".task-list",
      update: function( event, ui ) {
        var Item = ui.item;
        var ParentList = Item.parent();

        // If item is already checked move it to "current items list"
        if (ParentList.hasClass('task-current')) {
            Item.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
        }
        if (ParentList.hasClass('task-completed')) {
            Item.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
        }

      }
    });

    // Custom Functions to handle/assign list filter behavior
    taskItems.on('click', function(e) {
      e.preventDefault();
      var This = $(this);
      var Target = $(e.target);

      if (Target.is('.task-menu') && Target.parents('.task-completed').length) {
        This.remove();
        return;
      }

      if (Target.parents('.task-handle').length) {
		      // If item is already checked move it to "current items list"
		      if (This.hasClass('item-checked')) {
		        This.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
		      }
		      // Otherwise move it to the "completed items list"
		      else {
		        This.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
		      }
      }

    });

  });
  </script>

  <!-- Script Setting -->
  <script type="text/javascript" src="{{URL::to('assets/script/script.js')}}"></script>
  <script type="text/javascript">

    /*jQuery(window).bind('beforeunload', function(){
        var i = 0;
          $(":text, :file, :email, :password").each(function() {
             if($(this).val() != ""){
               i++;
             }
          });
        //i = Number(i);
        return i;
        if(i != ''){
          console.log(i);
          return "Confirm !!";
        }
        return false;
    });*/

 

  </script>
 

	<!-- END: PAGE SCRIPTS -->
@show