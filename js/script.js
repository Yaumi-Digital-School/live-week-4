$(document).ready(function() {
    $('.task-checkbox').click(function() {
        taskId = $(this).val();
        window.location.href = "change_task.php?task_id=" + taskId;
    })
})