<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <style>
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            background-color: rgb(243, 238, 238);
        }
        .content .card {
            flex: 1;
            margin: 50px 20px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.1);
            background-color: #fffefe;
        }
        .content .card img {
            width: 100%;
            height: auto;
        }
        .content .card h4 {
            margin-top: 10px;
            margin-left: 10px;
            font-size: 18px;
            color: black;
        }
        .content .card p {
            font-size: 15px;
            color: #0c0c0c;
            line-height: 1.5;
            padding: 10px;
        }
        .blogs__container {
            padding: 5rem 0;
            background-color: rgb(243, 238, 238);
            color: green;
        }
    </style>
</head>
<body>
    <section class="blogs" id="blog">
        <div class="blogs__container">
            <h2 class="section__header">Blogs</h2>
            <p class="section__subheader" style="text-align: center;">That dream was planted in your heart for a reason</p>
        </div>
        <div class="content">
            <?php
            $sql = "SELECT title, image, content FROM blogs";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<img src="' . $row["image"] . '">';
                    echo '<h4>' . $row["title"] . '</h4>';
                    echo '<p>' . $row["content"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No blogs found.";
            }
            $conn->close();
            ?>
        </div>
    </section>
</body>
</html>
