<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>

<h1>User Data</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Status</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($userData as $user) : ?>
            <?php
            $userId = $user->id;
            $userName = $user->name;
            $userPassword = $user->password;
            $userEmail = $user->email;
            $userStatus = $user->status;
            $userPhone = $user->phone;
            ?>
        <tr>
            <td><?php echo $userId; ?></td>
            <td><a href="<?php echo site_url('Users/getMainData?ownerId=' . $userId); ?>"><?php echo $userName; ?></a></td>
            <td><?php echo $userPassword; ?></td>
            <td><?php echo $userEmail; ?></td>
            <td><?php echo $userStatus; ?></td>
            <td><?php echo $userPhone; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Main Data</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Owner ID</th>
            <th>Date</th>
            <th>Value</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>

 
    <?php if (!empty($mainData)) { ?>
    
    <?php foreach ($mainData as $mData) { ?>
        <tr>
            <td><?php echo $mData->iD; ?></td>
            <td><?php echo $mData->ownerId; ?></td>
            <td><?php echo $mData->date_main; ?></td>
            <td><?php echo $mData->value; ?></td>
            <td><?php echo $mData->type; ?></td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr><td colspan="5">No data available</td></tr>
<?php } ?>

    </tbody>
</table>

<br/>
<br/>
<br/>
