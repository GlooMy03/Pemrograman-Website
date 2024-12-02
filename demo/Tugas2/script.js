function addTodo() {
    const todoInput = document.getElementById('todo-input');
    const todoList = document.getElementById('todo-list');
    const taskText = todoInput.value.trim();

    if (taskText !== '') {
        const listItem = document.createElement('li');

        const taskSpan = document.createElement('span');
        taskSpan.textContent = taskText;
        taskSpan.classList.add('todo-text');

        const deleteButton = document.createElement('button');
        deleteButton.textContent = '🗑';
        deleteButton.classList.add('delete-button');
        deleteButton.onclick = () => todoList.removeChild(listItem);

        listItem.appendChild(taskSpan);
        listItem.appendChild(deleteButton);
        todoList.appendChild(listItem);

        todoInput.value = '';
    }
}
