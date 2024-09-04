<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#taskTable').DataTable();

        // Load all tasks on page load
        $.ajax({
            url: "{{route('tasks.view')}}", // Your route to fetch all tasks
            type: 'GET',
            success: function(response) {
                $.each(response.tasks, function(index, task) {
                    table.row.add([
                        index + 1,
                        task.name,
                        task.is_completed ? '<span class="badge badge-success"><i class="fa-solid fa-hourglass-end"></i> Done</span>' : '<span class="badge badge-warning"><i class="fa-solid fa-hourglass-half"></i> Pending</span>',
                        task.is_completed ? '<button class="btn btn-danger btn-action delete-task" data-id="' + task.id + '"><i class="fa-solid fa-xmark"></i></button>' : '<button class="btn btn-success btn-action mark-complete" data-id="' + task.id + '"><i class="fa-solid fa-check"></i></button> | <button class="btn btn-danger btn-action delete-task" data-id="' + task.id + '"><i class="fa-solid fa-xmark"></i></button>'
                    ]).draw(false);
                });
                toastr.success('Tasks loaded successfully');
            },
            error: function(xhr) {
                alert('Failed to load tasks: ' + xhr.responseText);
            }
        });

        // Add new task via AJAX and append to DataTable
        $('#addTaskForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tasks', // Your route to handle adding a new task
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": $('#task_name').val()
                },
                success: function(response) {
                    table.row.add([
                        1,
                        response.name,
                        task.is_completed ? '<span class="badge badge-success"><i class="fa-solid fa-hourglass-end"></i> Done</span>' : '<span class="badge badge-warning"><i class="fa-solid fa-hourglass-half"></i> Pending</span>',
                        '<button class="btn btn-success btn-action mark-complete" data-id="' + task.id + '"><i class="fa-solid fa-check"></i></button> | <button class="btn btn-danger btn-action delete-task" data-id="' + task.id + '"><i class="fa-solid fa-xmark"></i></button>'
                    ]).draw(false);
                    toastr.success('Task added successfully');
                    $('#task_name').val(''); // Clear the input field
                    // Reorder and update serial numbers
                    updateSerialNumbers();
                },
                error: function(xhr) {
                    toastr.error('An error occurred: ' + xhr.responseJSON.message);
                    // console.log('An error occurred: ', xhr);
                }
            });
        });

        // Function to update serial numbers after adding a new task
        function updateSerialNumbers() {
            table.rows().every(function(rowIdx, tableLoop, rowLoop){
                var cell = table.cell(rowIdx, 0); // 0 is the index of the serial number column
                cell.data(rowIdx + 1).draw(false); // Update with new serial number
            });
        }
        // Event listeners for task actions
        $(document).on('click', '.mark-complete', function() {
            var button = $(this);
            var taskId = button.data('id');

            $.ajax({
                url: '/tasks/' + taskId,
                type: 'PATCH',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "is_completed": true
                },
                success: function(response) {
                    var row = button.closest('tr');
                    table.cell(row, 2).data('<span class="badge badge-success"><i class="fa-solid fa-hourglass-end"></i> Done</span>').draw(false);
                    button.remove(); // Remove the "Mark as Done" button
                    toastr.success('Task marked as complete');
                },
                error: function(xhr) {
                    // alert('An error occurred: ' + xhr.responseText);
                    toastr.error('An error occurred: ' + xhr.responseText);
                }
            });
        });

        $(document).on('click', '.delete-task', function() {
            var button = $(this);
            var taskId = button.data('id');

            if (confirm('Are you sure you want to delete this task?')) {
                $.ajax({
                    url: '/tasks/' + taskId,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        table.row(button.closest('tr')).remove().draw(false);
                    },
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        });
    });
</script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

</script>
