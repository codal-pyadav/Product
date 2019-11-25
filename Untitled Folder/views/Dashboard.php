<h1>Welcome Usre Login Success and list of all Product Here With Paginatation</h1>

<div class="container">
            <h3 class="title is-3">CodeIgniter Database Pagination</h3>
            <div class="column">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Contact Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($authors as $author): ?>
                            <tr>
                                <td><?= $author->p_id ?></td>
                                <td><?= $author->p_name ?></td>
                                <td><?= $author->p_desc ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><?php echo $links; ?></p>
            </div>
        </div>