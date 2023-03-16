import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// visit count with jQuery
$('.user-link').on('click', function()  {
    let linkId = $(this).data('link-id')
    let linkUrl = $(this).attr("href")

    axios.post(`/visit/${linkId}`, {
        link: linkUrl
    })
        .then(res => res)
        .catch(e => console.log(e.message))
}
)
