<div class="container">
    <h2>Store Election Result for each party</h2>
    <form id="storeResult" method="post">
    <div class="row mb-4">
    <div class="col-4">
                <div class="mb-1">
                <p><b> Party Name </b></p>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-1">
                <p><b> Party Score </b></p>
                </div>
            </div>
</div>
        
        <?php foreach($data AS $parties): if ($parties->partyid): ?>

            <div class="row">
            <div class="col-4">
                <div class="mb-3">
                <input name="party-abrr" value="<?php echo $parties->partyid ?>" disabled class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <input name="<?php echo $parties->partyid ?>" class="form-control" type="number"  />
            </div>
        </div>

    <?php endif; endforeach; ?>
          



       
    <div class="row">
        <div class="col-4">
        <div class="mb-3">
            <label for="selectPUInput" class="form-label">Polling Units</label>
            <select class="form-select" id="selectPUInput" name="pollingId" require>
            <option value="" selected>Select Polling Unit</option>
                    <?php foreach($data2 AS $pollingUnit): if ($pollingUnit->polling_unit_number): ?>
                    <option value="<?php echo $pollingUnit->uniqueid ?>">
                        <?php echo $pollingUnit->polling_unit_number; ?> - 
                        <?php echo $pollingUnit->polling_unit_name; ?>
                </option>
                <?php endif; endforeach; ?>
            </select>
            </div>
        </div>
        <div class="col-4">
        <label for="username" class="form-label">Name of Polling Officer</label>
            <input type="text" name="entered_by_user_" class="form-control" id="username" />
        </div>
        <div class="offset-col-4"></div>
        <div class="col-3">
        <div class="mb-3">
           <button type="submit" id="submit-polling-result" class="btn btn-full btn-primary">Submit Polling Result</button>
            </div>
        </div>
    </div>

</form>
</div>







