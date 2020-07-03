


if (document.getElementById('reservation-form')) {
    var app = new Vue({
        el: '#reservation-form',
        data: {
            equipments: [],
            rentedEquipment: [],
            rentedPlace: [],
            places: []
        },
        created() {
            this.loadEquipments();
            this.loadPlaces();
        },

        methods: {
            loadEquipments() {
                $.ajax({
                    url: base_url + 'equipment/load',
                    dataType: 'json', 
                    success: (response => {
                        app.equipments = response;
                    })
                });
            },

            loadPlaces() {
                $.ajax({
                    url: base_url + 'place/load',
                    dataType: 'json', 
                    success: (response => {
                        app.places = response;
                    })
                });
            },

            addEquipment(index) {
                app.rentedEquipment.unshift(app.equipments[index]);
                app.equipments.splice(index, 1);
            },

            removeEquipment(index) {
                app.equipments.unshift(app.rentedEquipment[index]);
                app.rentedEquipment.splice(index, 1);
            },

            addPlace(index) {
                app.rentedPlace.unshift(app.places[index]);
                app.places.splice(index, 1);
            },

            removePlace(index) {
                app.places.unshift(app.rentedPlace[index]);
                app.rentedPlace.splice(index, 1);
            } 
        }
    })
}


 

$(document).ready(function() { 

    $('.select2').select2();
    

    $('.btn-print').on('click', function() {
        // $('.print').printThis();
        $(".print").printThis({
            debug: false,               // show the iframe for debugging
            importCSS: true,            // import page CSS
            importStyle: true,         // import style tags
            pageTitle: ".",              // add title to print page
            removeInline: false,        // remove all inline styles from print elements
            printDelay: 333,            // variable print delay
            header: "",               // prefix to html
            footer: "",               // postfix to html
            base: true,                // preserve the BASE tag, or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: true,              // copy canvas elements (experimental)
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: true       // copy classes from the html & body tag
        });

    });
    
    $('#certificate-user_id').on('change', function() {
        $.ajax({
            url: base_url + 'people/get-siblings',
            data: {id: $('#certificate-user_id').val()},
            method: 'get',
            dataType: 'html', 
            success: (res => {
                $('.siblings-div').html(res);
            })
        });
    })
    

     var loadAdditionalInputs = function(certificate="", id="") {
        $.ajax({
            url: base_url + 'certificate/form',
            data: {certificate: certificate, id: id},
            method: 'get',
            dataType: 'html', 
            success: (res => {
                $('#additional-inputs').html(res);
                $('select2').select2();
            })
        });
    }


    var triggerAdditionalInputs = function() {
        if ($('#certificate-id').length) {
            loadAdditionalInputs(
                $('#certificate-name').val(), 
                $('#certificate-id').val()
            );
        } else {
            loadAdditionalInputs($('#certificate-name').val() );
        }
    }

    triggerAdditionalInputs();


    $('#certificate-name').on('change', function() {
        triggerAdditionalInputs();
    });





    $('.summernote').summernote({
        height: 300,
        tabsize: 2,
        followingToolbar: true,
      });
    
    $(document).on('focus','.dpicker', function() {
        $('.dpicker').datepicker();
    });



    // $(document).on('focus','input[type="date"]', function() {
    //     $('input[type="date"]').datepicker();
    // });


    $('.btn-print-card').on("click", function() {
        $('#id-cards').printThis();
    });





 

    $('#reservation-people_id').on("change", function() {
       $.ajax({
            url: base_url + 'people/load',
            data: {id: $(this).val()},
            method: 'get',
            dataType: 'html', 
            success: (response => {
                $('#people-details').html(response);
            })
        });
    });


    $('#about-image').on("change", function() {
        previewImage('about-image');
    });

    $('#history-image').on("change", function() {
        previewImage('history-image');
    });


    $('#achievement-image').on("change", function() {
        previewImage('achievement-image');
    });

    $('#people-image').on("change", function() {
        previewImage('people-image');
    });

    $('#place-image').on("change", function() {
        previewImage('place-image');
    });

    
    function previewImage(id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(id).files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    }

 
	function loadLots(blk_id) {
		$.ajax({
    		url: base_url + 'lot/load',
    		data: {blk_id: blk_id},
    		method: 'get',
    		dataType: 'json', 
    		success: (response => {
    			var html = '';

                var data = [];
    			response.forEach(lot => {
    				html += '<option value="'+ lot.id +'">' + lot.lot_no + '</option>';
                    data.push({id: lot.id, text: lot.lot_no});
    			})

                // $('#people-lot_id').empty().select2({
                //     data:data,
                // });

                // $('#place-lot_id').empty().select2({
                //     data:data,
                // });

    			$('#place-lot_id').html(html);
    			$('#people-lot_id').html(html);

    		})
    	});
	}

	function loadStreets(blk_id) {
		$.ajax({
    		url: base_url + 'street/load',
    		data: {blk_id: blk_id},
    		method: 'get',
    		dataType: 'json', 
    		success: (response => {
    			var html = '';
                var data = [];
    			response.forEach(street => {
    				html += '<option value="'+ street.id +'">' + street.name + '</option>';
                    data.push({id: street.id, text: street.name});
    			})

                // $('#place-street_id').empty().select2({
                //     data:data,
                // });
                
                // $('#people-street_id').empty().select2({
                //     data:data,
                // });


    			$('#place-street_id').html(html);
    			$('#people-street_id').html(html);

    		})
    	});
	}


	$('#submit-logout').on("click", function() {
		$('#logout-form').submit();
	});

	
	

    $('#place-blk_id').on('change', function() {
    	var blk_id = $(this).val();
    	loadLots(blk_id);
    	loadStreets(blk_id);
    });

    $('#people-blk_id').on('change', function() {
    	var blk_id = $(this).val();
    	loadLots(blk_id);
    	loadStreets(blk_id);
    });


    $('#w0 #peoplesearch-status, #peoplesearch-age, #peoplesearch-sex, #peoplesearch-blk_id, #peoplesearch-lot_id, #peoplesearch-street_id').on('change', function() {
    	$('#w0').submit();
    });

    $(".summary").hide();
	$(".empty").hide();

    $(".data").dataTable();

});