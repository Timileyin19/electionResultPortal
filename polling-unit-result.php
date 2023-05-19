
<div class="container">
<h2 class="mt-3">Polling Unit Result</h2>
<p>Select Polling Unit</p>
        <form id="pollingResult" method="post">
        <div class="row">
        <div class="col-6">
        <div class="mb-3">
            <label for="selectPUInput" class="form-label">Polling Units</label>
            <select class="form-select" id="selectPUInput" name="pollingId" require>
            <option value="" selected>Select Polling Unit</option>
                    <?php foreach($data AS $pollingUnit): if ($pollingUnit->polling_unit_number): ?>
                    <option value="<?php echo $pollingUnit->uniqueid ?>">
                        <?php echo $pollingUnit->polling_unit_number; ?> - 
                        <?php echo $pollingUnit->polling_unit_name; ?>
                </option>
                <?php endif; endforeach; ?>
            </select>
            </div>
        </div>
        <div class="offset-col-6"></div>
        <div class="col-3">
        <div class="mb-3">
           <button type="submit" id="fetch-polling-result" class="btn btn-full btn-primary">Fetch Polling Result</button>
            </div>
        </div>
        </div>
        </form>

        <div id="displayResultHere"></div>
 
</div>
