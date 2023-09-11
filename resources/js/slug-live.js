const title = document.getElementById('title')
const slug = document.getElementById('slug')

title.addEventListener('input', () => {

    if (title) {
        slug.value = title.value.trim().replace(/\s+/g, '-').toLowerCase()
    }

})