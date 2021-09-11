$(document).ready(function(){
	listEmployee();		
	var table = $('#employeeListing').dataTable({     
		"bPaginate": false,
		"bInfo": false,
		"bFilter": false,
		"bLengthChange": false,
		"pageLength": 5		
	}); 
	// list all employee in datatable
	function listEmployee(){
		$.ajax({
			type  : 'GET',
			url   : 'emp/show',
			async : false,
			dataType : 'json',
			success : function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr id="'+data[i].id+'">'+
							'<td>'+data[i].nama+'</td>'+
							'<td>'+data[i].kategori+'</td>'+
							'<td>'+data[i].harga+'</td>'+		                        
							'<td style="text-align:right;">'+
								'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="'+data[i].id+'" data-nama="'+data[i].nama+'" data-kategori="'+data[i].kategori+'" data-harga="'+data[i].harga+'">Edit</a>'+' '+
								'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="'+data[i].id+'">Delete</a>'+
							'</td>'+
							'</tr>';
				}
				$('#listRecords').html(html);					
			}

		});
	}
	// save new employee record
	$('#saveEmpForm').submit('click',function(){
		var dataNama = $('#nama').val();
		var dataKategori = $('#kategori').val();
		var dataHarga = $('#harga').val();
		$.ajax({
			type : "POST",
			url  : "emp/save",
			dataType : "JSON",
			data : {nama:dataNama, kategori:dataKategori, harga:dataHarga},
			success: function(data){
				$('#nama').val("");
				$('#skills').val("");
				$('#address').val("");
				$('#addEmpModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
	// show edit modal form with emp data
	$('#listRecords').on('click','.editRecord',function(){
		$('#editEmpModal').modal('show');
		$("#empId").val($(this).data('id'));
		$("#dataNama").val($(this).data('nama'));
		$("#dataKategori").val($(this).data('kategori'));
		$("#dataHarga").val($(this).data('harga'));
	});
	// save edit record
	 $('#editEmpForm').on('submit',function(){
		var empId = $('#empId').val();
		var dataNama = $('#dataNama').val();
		var dataKategori = $('#dataKategori').val();
		var dataHarga = $('#dataHarga').val();
		$.ajax({
			type : "POST",
			url  : "emp/update",
			dataType : "JSON",
			data : {id:empId, nama:dataNama, kategori:dataKategori, harga:dataHarga, skills:empSkills, address:empAddress},
			success: function(data){
				$("#empId").val("");
				$("#dataNama").val("");
				$('#dataKategori').val("");
				$('#dataHarga').val("");
				$('#editEmpModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
	// show delete form
	$('#listRecords').on('click','.deleteRecord',function(){
		var empId = $(this).data('id');            
		$('#deleteEmpModal').modal('show');
		$('#deleteEmpId').val(empId);
	});
	// delete emp record
	 $('#deleteEmpForm').on('submit',function(){
		var empId = $('#deleteEmpId').val();
		$.ajax({
			type : "POST",
			url  : "emp/delete",
			dataType : "JSON",  
			data : {id:empId},
			success: function(data){
				$("#"+empId).remove();
				$('#deleteEmpId').val("");
				$('#deleteEmpModal').modal('hide');
				listEmployee();
			}
		});
		return false;
	});
});