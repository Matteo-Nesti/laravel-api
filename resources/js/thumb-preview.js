
const thumbField = document.getElementById('thumb-field')
const thumbPreview = document.getElementById('thumb-preview')

const place = 'https://www.comune.foggia.it/wp-content/uploads/2021/03/placeholder.png'

let blobUrl = null;

thumbField.addEventListener('change', () => {
    if (thumbField.files && thumbField.files[0]) {
        // lettura file
        const file = thumbField.files[0]
        //creazione blob file
        blobUrl = URL.createObjectURL(file);
        thumbPreview.src = blobUrl;
    }
    else {
        thumbPreview.src = place;
    }
})
