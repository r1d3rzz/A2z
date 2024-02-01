<?php

function time_ago($timestamp)
{
    date_default_timezone_set('Asia/Yangon');
    $current_time = new DateTime();
    $timestamp = new DateTime($timestamp);
    $time_difference = $current_time->diff($timestamp);

    $units = [
        "y" => "year",
        "m" => "month",
        "d" => "day",
        "h" => "hour",
        "i" => "minute",
        "s" => "second"
    ];

    foreach ($units as $key => $value) {
        if ($time_difference->$key > 0) {
            $plural = $time_difference->$key > 1 ? "s" : "";
            return $time_difference->$key . " " . $value . $plural . " ago";
        }
    }

    return "just now";
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-body mt-5">
                <h4>Todos Lists</h4>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        require "connect.php";

                        $sql = "SELECT * FROM work";
                        $works = mysqli_query($conn, $sql);

                        if ($works) { ?>
                            <?php foreach ($works as $work) : ?>
                                <tr>
                                    <td><?= $work['id']; ?></td>
                                    <td><?= $work['name']; ?></td>
                                    <td><?= time_ago($work['created_at']); ?></td>
                                    <td class="d-flex align-items-center">
                                        <a href="/todo/editTodo.php?id=<?= $work['id']; ?>" class="btn btn-sm btn-warning rounded-2 me-2">Edit</a>
                                        <form action="/actions/todo/delete.php" method="POST">
                                            <input type="hidden" value="<?= $work['id'] ?>" name="id">
                                            <button onclick="return confirm('Are you sure delete this?')" class="btn btn-sm btn-danger rounded-2">Del</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>