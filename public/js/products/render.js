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
    const cell = document.createElement('td')
    cell.className = "flex space-x-2"
    
    /* Show Action */
    const showLink = document.createElement('a')
    showLink.href = `/product?id=${id}`
    showLink.textContent = "👀"
    showLink.className = "hover:underline"
    
    cell.append(showLink)

    /* Delete Action */
    const deleteForm = document.createElement('form')
    deleteForm.action = `/product`
    deleteForm.method = "POST"
    const deleteId = document.createElement('input')
    deleteId.name = "id"
    deleteId.value = id
    deleteId.type = "hidden"
    const deleteMethod = document.createElement('input')
    deleteMethod.name = "_method"
    deleteMethod.value = "DELETE"
    deleteMethod.type = "hidden"
    const deleteButton = document.createElement('button')
    deleteButton.type = "submit"
    deleteButton.textContent = "🗑️"
    deleteButton.className = "hover:underline cursor-pointer"

    cell.append(deleteForm)
    deleteForm.append(deleteId)
    deleteForm.append(deleteMethod)
    deleteForm.append(deleteButton)
    
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