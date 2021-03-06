
<div id="filter-panel" class="collapse filter-panel mb-4">
    <div class="panel panel-default bg-light p-3">
        <div class="panel-body">
            <form id="groups-filter-form" class="form" role="form">
                <div class="row">
             
                    <div class="form-group col-xs-4 col-md-4">
                        <label class="control-label" for="pref-perpage">Sent From</label>
                        <input type="date" class="form-control input-sm" name="start_date" id="filter-start-date">
                    </div>
                    <div class="form-group col-xs-4 col-md-4">
                        <label class="control-label" for="pref-search">Sent To</label>
                        <input type="date" class="form-control" name="end_date" id="filter-end-date">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" id="filter-submit" class="btn btn-primary btn-round btn-sm">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        <button type="reset" class="btn btn-primary btn-round btn-border btn-sm">Clear</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

