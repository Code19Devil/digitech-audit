<div class="modal fade" id="auditReport<?php print($row['id']) ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-sm-12 mt-3">
                    <div class="card card-primary">
                        <div class="bg-primary rounded text-center p-1">
                            <h4>Audit Report</h4>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-12 m-auto">
                                <h5><strong>Name </strong></h5>
                                <p>
                                    <?php print strtoupper($row['name']) ?>
                                </p>
                            </div>
                            <div class="col-lg-3 col-12 m-auto">
                                <h5><strong>Address</strong></h5>
                                <p>
                                    <?php print strtoupper($row['address']) ?>
                                </p>
                            </div>
                            <div class="col-lg-3 col-12 m-auto">
                                <h5><strong>Mobile</strong></h5>
                                <p>
                                    <?php print strtoupper($row['mobile']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3 col-12 m-auto">
                                <h5><strong>Roll No</strong></h5>
                                <p>
                                    <?php print strtoupper($row['roll_no']) ?>
                                </p>
                            </div>
                            <div class="col-lg-3 col-12 m-auto">
                                <h5><strong>Assigned To</strong></h5>
                                <p>
                                    <?php print strtoupper($row['assigned_to']) ?>
                                </p>
                            </div>
                            <div class="col-lg-3 col-12 m-auto">
                                <h5><strong>Assigned Time</strong></h5>
                                <p>
                                    <?php print strtoupper($row['assigned_time']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-5 col-12 m-auto">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" name="status" id="status"
                                    value="<?php print strtoupper($row['status']) ?>">
                                </p>
                            </div>
                            <div class="col-lg-5 col-12 m-auto">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control"></textarea>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>