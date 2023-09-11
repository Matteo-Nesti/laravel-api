const deleteProject = document.querySelectorAll('.delete-form');

deleteProject.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        const hasConfirmed = confirm('are you sure you want to delete the project?');
        if (hasConfirmed) form.submit();
    })
})