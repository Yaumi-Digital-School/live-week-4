<?php
    $db = new SQLite3('db/todo.db');
    $statement = $db->prepare("SELECT * from tasks");
    $results = $statement->execute();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Open+Sans">
        <!-- FontAwesome 5 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="main-app">
            <div class="container">
              <div class="icon">
                <i class="fas fa-chevron-left"></i>
                <img src="https://img2.pngdownload.id/20180523/tha/kisspng-businessperson-computer-icons-avatar-clip-art-lattice-5b0508dc6a3a10.0013931115270566044351.jpg" alt="">
              </div>
              <div class="top">
                <div class="todo-cd">
                <h1 class="title">Todo App</h1>
                <div class="section-input">
                    <form action="add_task.php" method="POST">
                        <input type="text" class="task-input" id="input-field" name="input_task" placeholder="Tambahkan task baru"/>
                        <button type="submit" class="btn-add-task"><i class="fas fa-plus"></i></button>
                    </form>
                </div>
                <div class="section-task">
                    <!-- TODO: Section task hanya berisi task yang belum done (is_done = 0) -->
                    <?php while ($todo = $results->fetchArray()) { ?>
                        <div class="task-item">
                                <input type=
                                       "checkbox"
                                       name="todos_item[]"
                                       class="task-checkbox"
                                       value="<?php echo $todo['id'] ?>"
                                       id="todo-<?php echo $todo['id'] ?>"/>
                                <span><?php echo $todo['name']; ?></span>
                            </span>
                        </div>
                    <?php } ?>
                </div>
                <div class="section-task-done">
                    <h3>Completed</h3>
                    <?php while ($todo = $results->fetchArray()) {
                            if ($todo['is_done'] == 1) { ?>
                        <div class="task-item" style="margin: 20px 0; border: solid 1px cornflowerblue">
                            <input type="checkbox"
                                   name="todos_item[]"
                                   class="task-checkbox"
                                   value="<?php echo $todo['id'] ?>"
                                   checked
                                   id="todo-<?php echo $todo['id'] ?>"/>
                            <span class="mark-done"><?php echo $todo['name']; ?></span>
                            </span>
                        </div>
                    <?php }
                        }
                    ?>
                </div>
              </div>
              </div>
            </div>
        </div>
    </body>
</html>
<script>

</script>
