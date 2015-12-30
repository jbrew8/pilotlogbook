/**
 * ownCloud - pilotlogbook
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author John Brewer VIII <jb8@octavius.org>
 * @copyright John Brewer VIII 2015
 */

(function ($, OC) {

    $(document).ready(function(){

	getLog();
	updateSummary();

	/* Navigation menu functions */
	
	$( "#show_log" ).click(function() {
	    refreshLog();
	});
	
	$( "#log_flight" ).click(function() {
	    $('#app-content-wrapper').empty();
	    var url = OC.generateUrl('apps/pilotlogbook/logflight');
	    $.get(url, function(data){
		$('#app-content-wrapper').append(data);

		// Change text of submit button to 'Save'
		var $inputs = $('#edit_flight :input');
		$inputs.each(function() {
		    if(this.type == 'submit'){
			this.value = 'Save Flight';
		    }		  
		});
			     

		$('#edit_flight').submit(function(e){
		    e.preventDefault();
		    
		    // get data from form and
		    // put input data into an array.
		    var $inputs = $('#edit_flight :input');
		    var values = {};
		    $inputs.each(function() {
			values[this.name] = $(this).val();
		    });
		    
		    var url = OC.generateUrl('apps/pilotlogbook/add');
		    var data = {
			"flight": values
		    };
		    
		    
		    var json = JSON.stringify(data);
		    $.ajax({
			url:url,
			type:"POST",
			data:json,
			contentType:"application/json; charset=utf-8",
			dataType:"json",
			success: function(){
			    alert("Flight added successfully!");
			    refreshLog();
			}
			
		    });

		});
		
			    
	    });
	});
    });

})(jQuery, OC);


/* updateSummary()- updates the summary section of the flight log page */
function updateSummary(){
    var url = OC.generateUrl('apps/pilotlogbook/summary');
    $.get(url, function(data){
	$('#totalFlightHours').replaceWith(data['total']);
	$('#totalDual').replaceWith(data['totalDual']);
	$('#totalSolo').replaceWith(data['totalSolo']);
    });

}

/* getLog()- a helper function that applies Datatables functionality to the main flight
   log table and activates the tables edit/delete controls. */
function getLog() {

    // configure the table to use Datatables plugin
    var table = $('#flight_table').DataTable({
	ajax: {
	    "url": OC.generateUrl('apps/pilotlogbook/flights'),
	    "dataSrc": '',
	},
	"dom": '<ft><"flight_table_bottom"irlp>',
	"columnDefs": [
            {
                "targets": [ 0, 7, 8, 11, 12, 15, 16, 17, 18, 22, 23, 24],
                "visible": false,
                "searchable": false
            },
	    {
		"targets": -1,
		"data": null,
		"defaultContent": "<a href='#' class='edit_row'>Edit</a>|<a href='#' class='delete_row'>Delete</a>"
	    }
		    
        ],
	columns: [
	    { data: 'id' },
	    { data: 'date' },
	    { data: 'aircraft' },
	    { data: 'tailNumber' },
	    { data: 'departurePoint' },
	    { data: 'arrivalPoint' },
	    { data: 'singleEngineLand' },
	    { data: 'multiEngineLand' },
	    { data: 'rotorcraft' },
	    { data: 'dualReceived' },
	    { data: 'pilotInCommand' },
	    { data: 'secondInCommand' },
	    { data: 'asFlightInstructor'},
	    { data: 'day' },
	    { data: 'night' },
	    { data: 'crossCountry' },
	    { data: 'actualInstrument' },
	    { data: 'simulatedInstrument' },
	    { data: 'instrumentApproach' },
	    { data: 'dayLandings' },
	    { data: 'nightLandings'},
	    { data: 'total'},
	    { data: 'cfiName' },
	    { data: 'cfiNumber' },
	    { data: 'notes'},
	    { data: null}
	]
    });

    // Allow show/hide for all columns
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
	
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
	
        // Toggle the visibility
        column.visible( ! column.visible() );
    });

    // Add 'edit' action that takes user to a log entry screen
    // pre-populated with the data from the selected row
    $('#flight_table tbody').on( 'click', '.edit_row', function () {
	var tableRow = table.row( $(this).parents('tr') ).data();
	var url = OC.generateUrl('apps/pilotlogbook/logflight');
	$('#app-content-wrapper').empty();
	$.get(url, function(data){
	    $('#app-content-wrapper').append(data);
	    // Populate the input fields in the form with the values
	    // for the flight in the selected row
	    var $inputs = $('#edit_flight :input');
	    $inputs.each(function() {
		if(this.type != 'submit'){
		    this.value = tableRow[this.name];
		}else{
		    this.value = 'Save';
		}
	    });

	    // enable the save button   
	    $( "#edit_flight" ).submit(function(e){
		e.preventDefault();
		var $inputs = $('#edit_flight :input');
		var values = {};
		$inputs.each(function() {
		    values[this.name] = $(this).val();
		});
		    
		var url = OC.generateUrl('apps/pilotlogbook/update');
		var data = {
		    "flight": values
		};

		var json = JSON.stringify(data);
		
		$.ajax({
		    url:url,
		    type:"POST",
		    data:json,
		    contentType:"application/json; charset=utf-8",
		    dataType:"json",
		    success: function(){
			alert("Flight updated successfully!");
			udpdateLog();
		    }
		    
		});

	    });
	});

    } );

     // Add 'delete' action that deletes the flight on the selected row
    $('#flight_table tbody').on( 'click', '.delete_row', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var doDelete = confirm("Are you sure you want to delete this flight? This cannot be undone.");
	if(doDelete){
	    var deleteUrl = OC.generateUrl('apps/pilotlogbook/delete/' + data.id);
	    $.ajax({
		url: deleteUrl,
		type: 'delete',
		success: function(data){
		    updateLog();
		}
	    });


	}
    });
}
			       
		 
function refreshLog(){
    var url = OC.generateUrl('apps/pilotlogbook/log');
    $('#app-content-wrapper').empty();
    $.get(url, function(data){
	$('#app-content-wrapper').append(data);
	getLog();
	updateSummary();
    });
}

function updateContent(content){
    $('#app-content-wrapper').empty();
    $('#app-content-wrapper').append(content);
}

