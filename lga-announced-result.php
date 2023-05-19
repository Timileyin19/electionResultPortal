<div class="container">
<h2 class="mt-3">Announced LGA Result</h2>
<p>Select Local Govt Area</p>
<form id="lgaResult" method="post">
<div class="row">
     <div class="col-4">
            <div class="mb-3">
            <label for="selectStateInput" class="form-label">State</label>
            <select class="form-select" id="selectStateInput" name="stateId">
                    <option value="" selected>Select State</option>
                    <?php foreach($data AS $states): if ($states->state_name): ?>
                    <option value="<?php echo $states->state_id ?>">
                        <?php echo $states->state_name; ?>
                </option>
                <?php endif; endforeach; ?>
            </select>
            </div>
        </div>
        <div class="col-4">
        <div class="mb-3">
            <label for="selectLGAInput" class="form-label">LGA</label>
            <select class="form-select" id="selectLGAInput" name="lgaId">
            <option selected>Select LGA</option>
            </select>
            </div>
        </div>
       <div class="col-offset-4"></div>
       <div class="col-4 mb-3">
       <button type="submit" id="fetch-LGA-result" class="btn btn-full btn-primary">Fetch LGA Result</button>
       </div>
</div>
                    </form>
                    <div id="displayResultHere"></div>
</div>