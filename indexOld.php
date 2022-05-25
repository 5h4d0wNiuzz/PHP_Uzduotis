<html>
    <head>
        <title>Hello World</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- Task 1 -->
        <h2> 1 Uzduotis </h2>
        <form action="reading.php" method="post">
            Enter file name <input type="text" id="file_name" name="file_name" placeholder="info.csv/.xml/.json">
            <!-- Sends file name form input to reading.php -->
            <input type="submit">
        </form>
        <!-- Task 2 -->
        <h2> 2 Uzduotis </h2>
        <form action="writing.php" method="post">
            Enter file name <input type="text" id="file_name" name="file_name" placeholder="writing.csv/.xml/.json">
            <!-- Sends file name form input to writing.php -->
            <input type="submit">
        </form>
        <!-- Task 3 -->
        <h2> 3 Uzduotis </h2>
        <form action="downlode.php" method="post">
            <div>
                <label for="type">File Type:</label>
                <select name="type" id="type">
                    <option value="" selected disabled>--- Choose file type ---</option>
                    <option value="csv">CSV</option>
                    <option value="xml">XML</option>
                    <option value="json">JSON</option>
                </select>
            </div>
            <!-- Sends file type form opcions to downlode.php -->
            <div>
                <button type="submit">Select</button>
            </div>          
        </form>
        <h2>Atgal i pirma</h2>
        <form action="index.php">
            <button type="submit" href="index.php">Click Me!</button> 
        </form>

    </body>
</html>