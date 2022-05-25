<html>
    <head>
        <title>Hello World</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <form action="download/downlode.php" method="post">
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
    </body>
</html>