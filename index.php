<?php 
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/da55eaefc3.js" crossorigin="anonymous"></script>
</head>

<body>
    <h2 class="top-heading">Todo List Application</h2>
    <div class="container" style="display: flex; flex-direction: column;">
        <form action="handleActions.php" method="post">
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox" placeholder="Add a new task" required />
                <button type="submit" name="add" id="add">Add</button>
            </div>

            <!-- Active Tasks -->
            <ul class="list">
                <?php 
                $itemList = get_items();
                while ($row = $itemList->fetch_assoc()) {
                ?>
                    <li class="item">
                        <p><?php echo htmlspecialchars($row["item"]); ?></p>
                        <div class="icon-container">
                            <button type="submit" name="checked" value="<?php echo (int)$row["id"]; ?>" title="Mark as done">
                                <i class="fas fa-circle-check"></i>
                            </button>
                            <button type="submit" name="deleted" value="<?php echo (int)$row["id"]; ?>" title="Delete task">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <!-- Completed Tasks -->
            <ul class="list">
                <?php 
                $checkedItems = get_items_checked();
                while ($row = $checkedItems->fetch_assoc()) {
                ?>
                    <li class="item fade">
                        <p class="deleted-text"><span><?php echo htmlspecialchars($row["item"]); ?></span></p>
                        <div class="icon-container">
                            <!-- Hide the check button for completed tasks -->
                            <button type="submit" name="deleted" value="<?php echo (int)$row["id"]; ?>" title="Delete task">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </form>
    </div>
</body>

</html>
