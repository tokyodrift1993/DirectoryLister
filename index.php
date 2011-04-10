<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Directory listing of &lt;DIRECTORY&gt;</title>
    <link rel="shortcut icon" href="resources/images/icons/folder.png" />
    
    <link rel="stylesheet" type="text/css" href="resources/css/rebase-min.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/directorylister.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/colorbox.css" />
</head>
<body>

<?php include('resources/DirectoryLister.php'); $lister = new DirectoryLister(); ?>

<div id="contentWraper">
    
    <div id="header" class="clearfix">
        <span class="fileName">File</span>
        <span class="fileSize">Size</span>
        <span class="fileModTime">Last Modified</span>
    </div>
    
    <ul id="directoryListing">
    <?php $x = 1; foreach($lister->listDirectory() as $name => $fileInfo): ?>
        <li class="<?php echo $x %2 == 0 ? 'even' : 'odd'; ?>">
            <a href="<?php if(is_dir($fileInfo['file_path'])) { echo '?dir=' . $fileInfo['file_path']; } else { echo $fileInfo['file_path']; } ?>" class="clearfix">
                <span class="fileName" style="background: transparent url(resources/images/icons/<?php echo $fileInfo['icon']; ?>) no-repeat left center;"><?php echo $name; ?></span>
                <span class="fileSize"><?php echo $fileInfo['file_size']; ?></span>
                <span class="fileModTime"><?php echo $fileInfo['mod_time']; ?></span>
            </a>
        </li>
    <?php $x++; endforeach; ?>
    </ul>

</div>

<div id="footer" class="clearfix">
    <div class="left"><a href="home">Home</a> &raquo; dir &raquo; another_dir</div>
    <div class="right">Powered by, <a href="http://www.directorylister.com">Directory Lister</a></div>
</div>

<pre>
    <?php print_r($lister->listDirectory()); ?>
</pre>

</body>
</html>