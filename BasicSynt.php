<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <title>Lesson 1</title>
    <!--HTML comment-->
</head>
<body>
    <p>First script!</p>
    <?php
        //one-line comment
        #one string comment too
        /* this
        is
        multiline comment
        here are commands that won't be executed
        echo <p>First script!</p>; */
        echo "<p>First script!</p>";
    ?>
    <?php echo "<p>First script!</p>"; ?>
    <?php echo "<p>Second script!</p>"; ?>
    <?php print "<p>Third script!</p>"; ?>

    //advanced usage
    //PHP skips blocks where the condition is not met
    
    <?php if ($expression == true): ?>
        This will be displayed, if true.
    <?php else: ?>
        Otherwise this will be displayed.
    <?php endif; ?>
</body>

/*
This is basics of syntax
Anything outside the opening and closing tag pair is ignored by the PHP interpreter, 
which has the ability to handle mixed content files.  
This allows PHP code to be embedded in HTML documents, for example, to create templates.
*/

