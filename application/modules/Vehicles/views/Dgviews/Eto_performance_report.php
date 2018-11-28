<div class="card">
                        <div class="header">
                            <h2>
                                ETO Performance and Reporting
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">


                            </ul>
                        </div>
						<div class="body" style="min-height:400px;">


	<div class="row">
	<div class="col-md-3">

	<select class="form-control show-tick" id="search_cat">
    <option value="All">All</option>
    <?php
    foreach ($all_districts as $key => $value):?>
<option value="<?= $value->districtid; ?>"><?= $value->districtname;?></option>

  <?php endforeach; ?>



                                    </select>
	</div>
	<div class="col-md-3">
	<div class="input-group demo-masked-input">
												<span class="input-group-addon">
													<i class="material-icons">date_range</i>
												</span>
												<div class="form-line">

													<input type="text" id="datef" name="fdate"
													class="datepicker form-control"
													placeholder="From Date" required>
												</div>
											</div>
	</div>
		<div class="col-md-3">
	<div class="input-group demo-masked-input">
												<span class="input-group-addon">
													<i class="material-icons">date_range</i>
												</span>
												<div class="form-line">

													<input type="text" id="datet" name="tdate"
													class="datepicker form-control"
													placeholder="To Date" required>
												</div>
											</div>
	</div>
	<div class="col-md-2">
			<div class="input-group demo-masked-input">
			<button class="btn btn-success"  id="search">Search</button>
			</div>
	</div>
	</div>

	<table id="dg_Eto_report_data" class="display" style="width:100%">
        <thead>
            <tr>

				<th>S.no</th>
                <th>Make</th>
                <th>Model</th>
                <th>Reg No</th>
                <th>Color</th>
                 <th>District Name</th>
                 
            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>
                      </div>

  </div>
