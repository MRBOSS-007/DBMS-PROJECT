<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="search.css">
</head>
<body>
    <div class="search-container">
        <h2>Search Student Details</h2>
        <form id="studentSearchForm">
            <input type="text" name ="search" id="searchInput" placeholder="Search by name or username">
            <button type="button" onclick="searchStudent()">Search</button>
        </form>
    </div>

    <div class="search-container">
        <h2>Search Arts</h2>
        <form action="search_arts.php" method="GET">
            <input type="text" name="arts_query" placeholder="Enter art type or keyword">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="search-container">
        <h2>Search Sports</h2>
        <form action="search_sports.php" method="GET">
            <input type="text" name="sports_query" placeholder="Enter sport type or keyword">
            <button type="submit">Search</button>
        </form>
    </div>

    <div id="searchResults"></div>

    <script>
        function searchStudent() {
            var searchText = document.getElementById("searchInput").value.trim();
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "search_student.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("searchResults").innerHTML = xhr.responseText;
                }
            };
            xhr.send("search=true&searchText=" + searchText);
        }
    </script>
</body>
</html>
