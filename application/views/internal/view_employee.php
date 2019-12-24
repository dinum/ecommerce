<section class="post-area section-gap">
    <div class="card width50">
            <div class="row">
            <table class="table table-striped">
              
            <tbody>
            <tr>
                    <th scope="row">1</th>
                    <td><strong>Name</strong></td>
                    <td><?php echo $data->fname." ".$data->mname." ".$data->lname; ?></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td><strong>Email</strong></td>
                    <td><?php echo $data->email; ?></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td><strong>Mobile</strong></td>
                    <td><?php echo $data->mobile; ?></td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td><strong>Address</strong></td>
                    <td><?php echo $data->address; ?></td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td><strong>Qualifications</strong></td>
                    <td><?php echo $data->qualification; ?></td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td><strong>Added Date</strong></td>
                    <td><?php echo $data->added_date; ?></td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td><strong>Status</strong></td>
                    <td><?php echo ($data->status==1)?"Active":"Inactive"; ?></td>
                </tr>
            </tbody>
            </table>
        </div>    
    </div>
</section>