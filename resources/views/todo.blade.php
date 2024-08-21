<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/root_assets/css/style.css')}}">
    <title>lara-todo</title>
</head>
<body>
    <div class="container">
        
    
        
        <div class="heading-container">
            <p class="heading">PHP - Simple To Do List App</p>
        </div>
        
        
        
        
        <div class="inputs">
            <input type="text" id="input-task">
            <button id="button-add">Add Task</button>
        </div>
        
        
        
        
        <div class="todos-container">
            <table>
                <thead>
                    <tr>
                        <th class="col-sr">#</th>
                        <th class="col-task">Task</th>
                        <th class="col-status">Status</th>
                        <th class="col-action">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    
    
    </div>

    <script src="{{asset('assets/root_assets/js/script.js')}}"></script>
</body>
</html>