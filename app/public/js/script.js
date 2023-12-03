document.addEventListener("click", function(evt) {

    if (evt.target.closest('[data-btnAdd]')) {
        let fieldset = document.querySelector('[data-add-attribute] fieldset').cloneNode(true);
        evt.target.before(fieldset);
    }

    if (evt.target.closest('[data-href]')) {
        getHTML(evt.target.dataset.href);
    }

    if (evt.target.closest('[data-popup-close]')) {
        document.querySelector('[data-popup]').remove();
    }

    if (evt.target.closest('[data-remove-attribute]')) {
        evt.target.parentNode.remove();
    }
});

async function SendForm (form) {

    let response = await fetch(form.action, {
        method: 'POST',
        headers: {'Accept': 'application/json',},
        body: new FormData(form)
    });

    if (response.redirected) {
        document.location = response.url;
    }

    if (response.status === 422) {
        const data = await response.json();
        console.log(data);
        const errors = data['errors'];
        for (const key in errors) {
            let element = form[key];
            errors[key].forEach((value) => {
                element.insertAdjacentHTML('beforebegin', `<span class="mess-alert">${value}</span>`);
            })
        }

    }
}

document.addEventListener("submit", function (evt) {
        evt.preventDefault();
        SendForm(evt.target);
});

async function getHTML(link) {
    let response = await fetch(link, {
        method: 'GET',
        headers: {'Accept': 'text/html'}
    });

    const responseHTML = await response.text();
    const newDiv = document.createElement('div');
    newDiv.innerHTML = responseHTML;
    document.querySelector('body').append(newDiv);


    /*
    const responseData = await response.json();
    const product = responseData['product'];
    for (const key in product) {
        if (key === 'data') {
            document.querySelector('[data-product-data]').innerHTML = '';
            const data = product['data'];
            for (const attribute in data) {
                const newP = document.createElement('p');
                newP.innerText = attribute + ': ' + data[`${attribute}`];
                document.querySelector('[data-product-data]').append(newP);
            }
        } else {
            document.querySelector(`[data-product-${key}]`).innerText = product[`${key}`];
        }
    }*/
}
