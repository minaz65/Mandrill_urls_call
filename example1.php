<?php
require 'header.php';
try {
    $mandrill = new Mandrill('VSM5dRyBdOeo_EpTyaPafg');
    //get the list of all URLS
    $result = $mandrill->urls->getList();
    ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>URL</th>
                <th>Sent</th>
                <th>Clicks</th>


            </tr>
            </thead>

            <?php
            foreach ($result as $key => $value) {
                echo '<tr>
                     <td>' . $value['url'] . '</td>' .
                    '<td>' . $value['sent'] . '</td>' .
                    '<td>' . $value['clicks'] . '</td>' . '</tr>';
            }
            ?>
        </table>
    </div>
    <pre>
    <?php print_r($result); ?>
    </pre>

    <p>you can get the list of tracking domains set up for this account.</p>
    <?php
    $result1 = $mandrill->urls->trackingDomains();
    ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Domain</th>
                <th>Created at</th>
                <th>Last tested at</th>


            </tr>
            </thead>

            <?php
            foreach ($result1 as $key => $value) {
                echo '<tr>
                     <td>' . $value['domain'] . '</td>' .
                    '<td>' . $value['created_at'] . '</td>' .
                    '<td>' . $value['last_tested_at'] . '</td>' . '</tr>';
            }
            ?>
        </table>
    </div>
    <pre><?php print_r($result1); ?></pre>
<?php
} catch (Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
    throw $e;
}
?>
<?php
require 'footer.php';
?>
