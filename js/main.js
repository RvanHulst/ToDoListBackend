function filterTasks(taskStatus) {
    //These two constants gets the elements from the page and makes them available to be used.
    const taskRows = document.getElementsByClassName('tasksTable');
    const statusRow = document.getElementsByClassName(taskStatus);

    //Gets all the tasks through a loop, and checks if they're matched or not. If they aren't matched they show all if you select the 'ALles' option, otherwise it hides that particular category.
    for (var unmatchedTasks = 0; unmatchedTasks < taskRows.length; unmatchedTasks++) {
        if (taskStatus == 'Alles') {
            taskRows[unmatchedTasks].style.display = 'table-row';
        } else {
            taskRows[unmatchedTasks].style.display = 'none';
        }
    }

    //Shows the tasks that are matched to the criteria of your filter.
    for (var matchedTasks = 0; matchedTasks < statusRow.length; matchedTasks++) {
        statusRow[matchedTasks].style.display = 'table-row'
    }
}