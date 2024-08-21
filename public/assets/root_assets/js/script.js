/**
 * 
 *  <tr>
        <td class="col-sr">1</td>
        <td class="col-task"></td>
        <td class="col-status">done</td>
        <td class="col-action">
            <button class="done-button">&check;</button>
            | <button class="delete-button">x</button>
        </td>
    </tr>
 * 
 * 
 */


async function fetch_tasks() {
    let data = await fetch('/api/tasks');
    let json_data = await data.json();

    let table_body = ``;
    for (let row in json_data) {



        let table_row = `
            <tr id="task_row_${json_data[row].id}">
                <td class="col-sr">${parseInt(row) + 1}</td>
                <td class="col-task">${json_data[row].task}</td>
                <td class="col-status">${(json_data[row].status == 1) ? 'Done' : ''}</td>
                <td class="col-action">
                    <span style="display:${(json_data[row].status == 0) ? '' : 'none'}"><button onclick="mark_done(${json_data[row].id});" class="done-button">&check;</button> | </span>
                    <button class="delete-button" onclick="delete_task(${json_data[row].id});">x</button>
                </td>
             </tr>
        `;

        table_body += table_row;

    }

    document.querySelector('.todos-container tbody').innerHTML = table_body;
}

fetch_tasks();


async function delete_task(id) {
    if (!confirm('Are you surely want to delete this task?')) return false;
    let post_data = JSON.stringify({ "id": id });

    await fetch('/api/tasks', {
        method: 'delete',
        body: post_data,
        headers: {
            'content-type': 'application/json'
        }
    });

    fetch_tasks();

}


async function mark_done(id) {
    let post_data = JSON.stringify({ "id": id });
    await fetch('/api/tasks/done', {
        method: 'put',
        body: post_data,
        headers: {
            'content-type': 'application/json'
        }
    });

    fetch_tasks();
}


async function add_task() {
    let input_task = document.querySelector('#input-task').value;
    let post_data = JSON.stringify({ 'task': input_task });
    let response = await fetch('/api/tasks', {
        method: 'post',
        body: post_data,
        headers: {
            'content-type': 'application/json'
        }
    });

    let json_response = await response.json();
    if ((json_response?.errorInfo) != undefined) {
        if (json_response.errorInfo[1] == 1062) {
            alert('Task already exists!');

        }

    }

    fetch_tasks();
}



document.querySelector('#button-add').addEventListener('click', add_task);
document.querySelector('#input-task').addEventListener('keypress', function(event){
    if(event.key == 'Enter') add_task();
});