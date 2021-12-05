<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-size: 10px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h1 style="font-size: 14px; text-transform: capitalize;">Report <?= $title; ?></h1>
        <p style="font-size: 12px; text-transform: lowercase;">report <?= $title; ?> data, this is show data of <?= $type; ?></p>

        <table>

            <tr>
                <?php if (isset($datas)) : ?>
                    <?php foreach ($datas[0] as $key => $data) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach; ?>
                <?php endif ?>
            </tr>
            <?php if (isset($datas)) : ?>
                <tr>
                    <?php foreach ($datas[0] as $key => $data) : ?>
                        <th><?= empty($data) ? "-" : $data ?></th>
                    <?php endforeach; ?>
                </tr>
            <?php endif ?>
        </table>
    </div>

</body>

</html>