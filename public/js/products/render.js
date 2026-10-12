const productList = document.getElementById('productList')

export function renderProducts(products) {
    productList.replaceChildren(...products.map(buildRow))
}

export function addProductToList(product) {
    productList.append(buildRow(product))
}

function buildRow(product) {
    const tableRow = document.createElement('tr')

    const actionCell = document.createElement('td')
    actionCell

    tableRow.append(
        createCell(product.name),
        createCell(product.price),
        createCell(product.quantity),
        createAction(product.id)
    )

    return tableRow
}

function createCell(text) {
    const cell = document.createElement('td')
    cell.textContent = text
    return cell
}

function createAction(id) {

    /* Show Action */
    const showLink = document.createElement('a')
    showLink.href = `/product?id=${id}`
    showLink.textContent = "👀"

    const deleteButton = document.createElement('button')
    deleteButton.type = "button"
    deleteButton.textContent = "🗑️"
    deleteButton.dataset.id = id

    const wrapper = document.createElement('div')
    wrapper.className = "flex space-x-2"
    wrapper.append(showLink, deleteButton)

    const actionCell = document.createElement('td')
    actionCell.append(wrapper)

    return actionCell
}

/**
 * Display the error to the user
 */
export function showErrors(errors = {}) {
    for (const [field, message] of Object.entries(errors)) {
        const errorElement = document.getElementById(`error-${field}`);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    }
}

/**
 * Remove all errors
 */
export function clearErrors() {
    document.querySelectorAll('[id^="error-"]').forEach((el) => {
        el.textContent = '';
        el.classList.add('hidden');
    });
}