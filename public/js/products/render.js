const productList = document.getElementById('productList')

export function renderProducts(products) {
    productList.replaceChildren(...products.map(buildRow))
}

export function addProductToList(product) {
    productList.append(buildRow(product))
}

function buildRow(product) {
    const tableRow = document.createElement('tr')

    tableRow.append(
        createCell(product.name),
        createCell(product.price),
        createCell(product.quantity),
        createCell(product.id),
    )

    return tableRow
}

function createCell(text) {
    const cell = document.createElement('td')
    cell.textContent = text
    return cell
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