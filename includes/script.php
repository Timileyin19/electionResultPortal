<script>
     $("document").ready(function(){

          // ----------------------------------------------------------------------------
        // State, LGA, Ward and Polling Unit Dropdown
        // ----------------------------------------------------------------------------
        $("#selectStateInput").on("change",function(){
            if($("#selectStateInput").val() == '' || $("#selectStateInput").val() == null){
                swal("Opps!!","Please Select a State First.","info"); 
            } else {
                let state = $("#selectStateInput").val();
                let lga =  '<?php echo (!empty($data2) && is_string($data2)) ? $data2 : ""; ?>';
                let options = "<option value=''>Select LGA</option>";

                if (!lga == "") {
                    lga = JSON.parse(lga);

                    for (i = 0; i < lga.length; i++) {
                        if(lga[i].state_id == state) {
                            options += "<option value='"+lga[i].uniqueid + "' stateId='"+state+"'>" + lga[i].lga_name+"</option>"
                        }
                    }
                }

                $("#selectLGAInput").html(options);

            }
        })


        $("#selectLGAInput").on("change",function(){
            if($("#selectLGAInput").val() == '' || $("#selectLGAInput").val() == null){
                swal("Opps!!","Please Select a LGA First.","info"); 
            } else {
                let lga = $("#selectLGAInput").val();
                let ward =  '<?php echo (!empty($data3) && is_string($data3)) ? $data3 : ""; ?>';
                let options = "<option value=''>Select Ward</option>";

                if (!ward == "") {
                    lga = JSON.parse(ward);

                    for (i = 0; i < ward.length; i++) {
                        if(ward[i].lga_id == lga) {
                            options += "<option value='"+ward[i].uniqueid + "' lgaId='"+lga+"'>" + ward[i].ward_name+"</option>"
                        }
                    }
                }

                $("#selectWardInput").html(options);

            }
        })

        $("#pollingResult").submit(function(e){
            e.preventDefault();

            if($("#selectPUInput").val() == '' || $("#selectPUInput").val() == null){
                swal("Error!","Please select polling unit","error");
                return 0;
            }

            const pollingUnitId = $("#selectPUInput").val();
            
            $.ajax({
                url:'includes/route.php?fetch-polling-unit-result',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success:function(resp){
                    result = JSON.parse(resp);
                    if (result.length < 1) {
                        swal("Opps!!","No Result for ths selected Pollling Unit at the Moment","info"); 
                    } else {
                        let resultToDisplay = "<div class='row'>";
                        for (let i = 0; i < result.length; i++) {
                            resultToDisplay += "<div class='col-3 mb-2'><strong>" + result[i].party_abbreviation + ": </strong>" + result[i].party_score + " votes </div>"
                        }
                        resultToDisplay += "</div>";

                        $("#displayResultHere").html(resultToDisplay);
                    }
                }
            })
        })


        $("#lgaResult").submit(function(e){
            e.preventDefault();

            if($("#selectLGAInput").val() == '' || $("#selectLGAInput").val() == null){
                swal("Error!","Please select Local Govt Area","error");
                return 0;
            }

            const lgaId = $("#selectLGAInput").val();
            
            $.ajax({
                url:'includes/route.php?fetch-lga-result',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success:function(resp){
                    result = JSON.parse(resp);
                    if (result.length < 1) {
                        swal("Opps!!","No Result for ths selected Local Govt Area at the Moment","info"); 
                    } else {
                        let resultToDisplay = "<div class='row'>";
                        for (let i = 0; i < result.length; i++) {
                            resultToDisplay += "<div class='col-3 mb-2'><strong>" + result[i].party_abbreviation + ": </strong>" + result[i].total_score + " votes </div>"
                        }
                        resultToDisplay += "</div>";

                        $("#displayResultHere").html(resultToDisplay);
                    }
                }
            })
        })


        $("#storeResult").submit(function(e){
            e.preventDefault();

            if($("#selectPUInput").val() == '' || $("#selectPUInput").val() == null){
                swal("Error!","Please select Polling Unit","error");
                return 0;
            }

            $.ajax({
                url:'includes/route.php?submit-pu-result',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success:function(resp){
                    if (resp == 1) {
                        swal("Success","Polling Unit Inputted Successfully","info")
                        .then(function() {
                            location.reload();
                        });; 
                    } else {
                        swal("Error!","An error occur, please try again!!!","error");
                    }
                }
            })

          

        })



     })





</script>