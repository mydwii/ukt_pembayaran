<!DOCTYPE html>
<html>

<head>
    <title>Upload Music</title>
</head>

<body>

    <h1>Upload Music</h1>

    <?php echo form_open_multipart('music/upload'); ?>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <br>

    <label for="musicfile">Select Music File:</label>
    <input type="file" name="musicfile" id="musicfile" required>
    <br>

    <input type="submit" value="Upload">

    <?php echo form_close(); ?>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

</body>

</html>