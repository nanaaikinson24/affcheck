<div class="container">
  <h1 class="h3 mb-4 text-gray-800">Search Results</h1>

  <div class="row pt-3 pb-5">
    <div class="col-md-12">
      <div class="card" style="border-radius: 0;">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Query</th>
                  <th>Checked By</th>
                  <th>Checked On</th>
                  <th>Device Type</th>
                  <th>Location</th>
                  <!-- <th>Status</th> -->
                </tr>
              </thead>

              <tbody>
                <?php if (isset($results) && !empty($results)) : ?>
                <?php foreach ($results as $result) : ?>
                <tr>
                  <td><?= $result->id; ?></td>
                  <td><?= $result->query; ?></td>
                  <td><?= $result->user; ?></td>
                  <td><?= gmdate('M d, Y', strtotime($result->created_at)) . ' ' . gmdate('h:i A', strtotime($result->created_at)); ?></td>
                  <td><?= $result->device; ?></td>
                  <td width="20%"><?= $result->location; ?></td>

                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>